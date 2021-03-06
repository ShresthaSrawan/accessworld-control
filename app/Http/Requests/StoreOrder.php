<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'customer_id' => 'required',
            'date'        => 'required|date'
        ];

        if ($this->has('vps'))
        {
            $rules['vps.*.name'] = 'required';
            $rules['vps.*.operating_system_id'] = 'required';
            $rules['vps.*.data_center_id'] = 'required';
            $rules['vps.*.term'] = 'required_unless:vps.*.is_trial,1';
            $rules['vps.*.price'] = 'required_unless:vps.*.is_trial,1';
            $rules['vps.*.currency'] = 'required|in:NPR,USD';
            $rules['vps.*.cpu'] = 'required';
            $rules['vps.*.ram'] = 'required';
            $rules['vps.*.disk'] = 'required';
            $rules['vps.*.traffic'] = 'required';
        }

        if ($this->has('web'))
        {
            $rules['web.*.name'] = 'required';
            $rules['web.*.term'] = 'required';
            $rules['web.*.price'] = 'required';
            $rules['web.*.domain'] = 'required';
            $rules['web.*.disk'] = 'required';
            $rules['web.*.traffic'] = 'required';
        }

        if ($this->has('email'))
        {
            $rules['email.*.name'] = 'required';
            $rules['email.*.term'] = 'required';
            $rules['email.*.price'] = 'required';
            $rules['email.*.domain'] = 'required';
            $rules['email.*.disk'] = 'required';
            $rules['email.*.traffic'] = 'required';
        }

        if ($this->has('endpoint-security'))
        {
            $rules['endpoint-security.*.term'] = 'required';
            $rules['endpoint-security.*.price'] = 'required';
            $rules['endpoint-security.*.user_count'] = 'required';
        }

        return $rules;
    }

    public function createOrder()
    {
        $data = [
            'customer_id' => $this->get('customer_id'),
            'slug'        => str_slug(date('Ymd H') . '-' . $this->get('customer_id')),
            'date'        => $this->get('date'),
            'created_by'  => auth()->id()
        ];

        return Order::create($data);
    }

    /**
     * @param Order $order
     */
    public function createVpsOrder(Order $order)
    {
        foreach ($this->get('vps') as $key => $values)
        {
            $term = $this->input('vps.' . $key . '.term');
            $is_trial = $this->input('vps.' . $key . '.trial');

            $data = [
                'name'                => $this->input('vps.' . $key . '.name'),
                'operating_system_id' => $this->input('vps.' . $key . '.operating_system_id'),
                'data_center_id'      => $this->input('vps.' . $key . '.data_center_id'),
                'term'                => $term ? $is_trial ? null : $term : null,
                'cpu'                 => $this->input('vps.' . $key . '.cpu'),
                'ram'                 => $this->input('vps.' . $key . '.ram'),
                'disk'                => $this->input('vps.' . $key . '.disk'),
                'traffic'             => $this->input('vps.' . $key . '.traffic'),
                'price'               => $this->input('vps.' . $key . '.price') ?: 0,
                'currency'            => $this->input('vps.' . $key . '.currency') ?: 0,
                'discount'            => $this->input('vps.' . $key . '.discount') ?: 0,
                'is_trial'            => $this->input('vps.' . $key . '.is_trial') ?: 0,
                'is_managed'          => $this->input('vps.' . $key . '.is_managed') ?: 0,
                'additional_ip'       => $this->input('vps.' . $key . '.additional_ip') ?: 0,
            ];

            $order->vpsOrder()->create($data);
        }
    }

    /**
     * @param Order $order
     */
    public function createWebOrder(Order $order)
    {
        foreach ($this->get('web') as $key => $values)
        {
            $data = [
                'name'     => $this->input('web.' . $key . '.name'),
                'term'     => $this->input('web.' . $key . '.term') ?: null,
                'domain'   => $this->input('web.' . $key . '.domain'),
                'disk'     => $this->input('web.' . $key . '.disk'),
                'traffic'  => $this->input('web.' . $key . '.traffic'),
                'price'    => $this->input('web.' . $key . '.price') ?: null,
                'currency' => $this->input('web.' . $key . '.currency') ?: null,
                'discount' => $this->input('web.' . $key . '.discount') ?: 0
            ];

            $order->webOrder()->create($data);
        }
    }

    /**
     * @param Order $order
     */
    public function createEmailOrder(Order $order)
    {
        foreach ($this->get('email') as $key => $values)
        {
            $data = [
                'name'     => $this->input('email.' . $key . '.name'),
                'term'     => $this->input('email.' . $key . '.term') ?: null,
                'domain'   => $this->input('email.' . $key . '.domain'),
                'disk'     => $this->input('email.' . $key . '.disk'),
                'traffic'  => $this->input('email.' . $key . '.traffic'),
                'price'    => $this->input('email.' . $key . '.price') ?: null,
                'currency' => $this->input('email.' . $key . '.currency') ?: null,
                'discount' => $this->input('email.' . $key . '.discount') ?: 0
            ];

            $order->emailOrder()->create($data);
        }
    }

    /**
     * @param $order
     */
    public function createEndPointSecurityOrder($order)
    {
        foreach ($this->get('endpoint-security') as $key => $values)
        {
            $data = [
                'user_count' => $this->input('endpoint-security.' . $key . '.user_count'),
                'term'       => $this->input('endpoint-security.' . $key . '.term', null),
                'price'      => $this->input('endpoint-security.' . $key . '.price', null),
                'currency'   => $this->input('endpoint-security.' . $key . '.currency', null),
                'discount'   => $this->input('endpoint-security.' . $key . '.discount', 0)
            ];

            $order->endpointSecurityOrder()->create($data);
        }
    }
}
