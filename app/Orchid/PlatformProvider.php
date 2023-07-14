<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [

            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
                ->icon('bs.lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make('Articles')
                ->icon('bs.file-earmark-post')
                ->route('platform.article.list')
                ->permission('platform.systems.roles')
                ->title('Articles'),

            Menu::make('Article tags')
                ->icon('bs.file-earmark-post')
                ->route('platform.articletag.list')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make('Events')
                ->icon('bs.file-earmark-post')
                ->route('platform.event.list')
                ->permission('platform.systems.roles')
                ->title('Events'),

            Menu::make('Event registrations')
                ->icon('bs.file-earmark-check-fill')
                ->route('platform.event-registration.list')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make('Cso')
                ->icon('bs.buildings-fill')
                ->route('platform.cso.list')
                ->permission('platform.systems.roles')
                ->title('CSO')
                ->divider(),

            Menu::make('Accomodations')
                ->icon('bs.buildings')
                ->route('platform.accomodation.list')
                ->permission('platform.systems.roles')
                ->title('Lodge'),

            Menu::make('Bookings')
                ->icon('bs.buildings')
                ->route('platform.booking.list')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make('Contacts')
                ->icon('bs.phone')
                ->route('platform.contact.list')
                ->permission('platform.systems.roles')
                ->title('Info')
                ->divider(),

            Menu::make('Expert Profiles')
                ->icon('bs.people')
                ->route('platform.expert.list')
                ->title('Expert Profiles'),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
