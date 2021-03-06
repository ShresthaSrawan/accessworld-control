<?php

namespace App\Http\ViewCreators;

use Illuminate\View\View;

class MenuBarCreator {

    /**
     * The user model.
     *
     * @var \App\Models\User;
     */
    protected $user;

    /**
     * Create a new menu bar composer.
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function create(View $view)
    {
        $menu[] = [
            'class' => false,
            'route' => route('home'),
            'icon'  => 'md md-home',
            'title' => 'Home'
        ];

        if ($this->user->can('read.order'))
        {
            array_push($menu, [
                'class' => 'gui-folder',
                'route' => 'javascript:void(0);',
                'icon'  => 'md md-markunread-mailbox',
                'title' => 'Orders',
                'items' => [
                    ['route' => route('order.index'), 'title' => 'All'],
                    ['route' => route('order.vps.index'), 'title' => 'VPS'],
                    ['route' => route('order.web.index'), 'title' => 'Web'],
                    ['route' => route('order.email.index'), 'title' => 'Email'],
                    ['route' => route('order.endpointSecurity.index'), 'title' => 'Endpoint Security'],
                ]
            ]);
        }

        if ($this->user->can('read.provision'))
        {
            array_push($menu, [
                'class' => 'gui-folder',
                'route' => 'javascript:void(0);',
                'icon'  => 'md md-cloud',
                'title' => 'Provisions',
                'items' => [
                    ['route' => route('provision.vps.index'), 'title' => 'VPS'],
                    ['route' => route('provision.web.index'), 'title' => 'Web'],
                    ['route' => route('provision.email.index'), 'title' => 'Email']
                ]
            ]);
        }

        if ($this->user->can('read.ip'))
        {
            array_push($menu, [
                'class' => 'gui-folder',
                'route' => 'javascript:void(0);',
                'text'  => 'IP',
                'title' => 'IP Management',
                'items' => [
                    ['route' => route('ip.index'), 'title' => 'IP Pool'],
                    ['route' => route('dhcp.map.index'), 'title' => 'DHCP']
                ]
            ]);
        }

        if ($this->user->can('read.customer'))
        {
            array_push($menu, [
                'class' => false,
                'route' => route('customer.index'),
                'icon'  => 'md md-people',
                'title' => 'Customers'
            ]);
        }

        if ($this->user->can('read.staff'))
        {
            array_push($menu, [
                'class' => false,
                'route' => route('staff.index'),
                'icon'  => 'md md-assignment-ind',
                'title' => 'Staffs'
            ]);
        }

        if ($this->user->can('read.user'))
        {
            array_push($menu, [
                'class' => 'gui-folder',
                'route' => 'javascript:void(0);',
                'icon'  => 'md md-face-unlock',
                'title' => 'Users',
                'items' => [
                    ['route' => route('user.index'), 'title' => 'All'],
                    ['route' => route('user.create'), 'title' => 'Create']
                ]
            ]);
        }

        if ($this->user->can('read.role'))
        {
            array_push($menu, [
                'class' => false,
                'route' => route('role.index'),
                'icon'  => 'md md-group-work',
                'title' => 'Roles'
            ]);
        }

        if ($this->user->can('read.traffic'))
        {
            array_push($menu, [
                'class' => 'gui-folder',
                'icon'  => 'md md-trending-up',
                'title' => 'Traffic',
                'route' => 'javascript:void(0);',
                'items' => [
                    ['route' => route('traffic.daily.index'), 'title' => 'Daily'],
                    ['route' => route('traffic.monthly.index'), 'title' => 'Monthly']
                ]
            ]);
        }

        if ($this->user->can('read.content'))
        {
            array_push($menu,
                [
                    'class' => 'gui-folder',
                    'route' => 'javascript:void(0);',
                    'icon'  => 'md md-wallet-giftcard',
                    'title' => 'Packages',
                    'items' => [
                        ['route' => route('vpsPackage.index'), 'title' => 'VPS'],
                        ['route' => route('webPackage.index'), 'title' => 'Web'],
                        ['route' => route('emailPackage.index'), 'title' => 'Email'],
                    ]
                ],
                [
                    'class' => 'gui-folder',
                    'route' => 'javascript:void(0);',
                    'icon'  => 'md md-settings-input-composite',
                    'title' => 'Component',
                    'items' => [
                        ['route' => route('component.vps.index'), 'title' => 'VPS'],
                        ['route' => route('component.web.index'), 'title' => 'Web'],
                        ['route' => route('component.email.index'), 'title' => 'Email'],
                    ]
                ],
                [
                    'class' => false,
                    'route' => route('page.index'),
                    'icon'  => 'md md-pages',
                    'title' => 'Pages'
                ],
                [
                    'class' => false,
                    'route' => route('menu.index'),
                    'icon'  => 'md md-list',
                    'title' => 'Menu'
                ],
                [
                    'class' => false,
                    'route' => route('service.index'),
                    'icon'  => 'md md-layers',
                    'title' => 'Services'
                ],
                [
                    'class' => false,
                    'route' => route('testimonial.index'),
                    'icon'  => 'md md-message',
                    'title' => 'Testimonials'
                ],
                [
                    'class' => false,
                    'route' => route('certificate.index'),
                    'icon'  => 'md md-verified-user',
                    'title' => 'Certificates'
                ],
                [
                    'class' => false,
                    'route' => route('client.index'),
                    'icon'  => 'md md-people-outline',
                    'title' => 'Clients'
                ],
                [
                    'class' => false,
                    'route' => route('operatingSystem.index'),
                    'icon'  => 'md md-computer',
                    'title' => 'Operating Systems'
                ],
                [
                    'class' => false,
                    'route' => route('dataCenter.index'),
                    'icon'  => 'md md-place',
                    'title' => 'Data Centers'
                ]
            );
        }

        $view->with('allMenu', $menu);
    }
}