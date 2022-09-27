<?php

namespace App\Providers;

use Domain\Client\AddBalanceByClientIdInterface;
use Domain\Client\AddBonusBalanceByClientIdInterface;
use Domain\Client\AddClientInterface;
use Domain\Client\ClientGroup\GetClientGroupNameByIdsInterface;
use Domain\Client\ClientGroup\GetFirstClientGroupIdByClubIdInterface;
use Domain\Client\GetClientsByClubIdInterface;
use Domain\Client\GetCountClientByClubIdInterface;
use Domain\Client\RemoveBalanceByClientIdInterface;
use Domain\Client\RemoveBonusBalanceByClientIdInterface;
use Illuminate\Support\ServiceProvider;
use Persistance\Action\Client\AddBalanceByClientIdAction;
use Persistance\Action\Client\AddBonusBalanceByClientIdAction;
use Persistance\Action\Client\AddClientAction;
use Persistance\Action\Client\ClientGroup\GetClientGroupNameByIdsAction;
use Persistance\Action\Client\ClientGroup\GetFirstClientGroupIdByClubIdAction;
use Persistance\Action\Client\GetClientsByClubIdAction;
use Persistance\Action\Client\GetCountClientByClubIdAction;
use Persistance\Action\Client\RemoveBalanceByClientIdAction;
use Persistance\Action\Client\RemoveBonusBalanceByClientIdAction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GetCountClientByClubIdInterface::class, GetCountClientByClubIdAction::class);
        $this->app->bind(AddClientInterface::class, AddClientAction::class);
        $this->app->bind(GetClientsByClubIdInterface::class, GetClientsByClubIdAction::class);
        $this->app->bind(AddBalanceByClientIdInterface::class, AddBalanceByClientIdAction::class);
        $this->app->bind(AddBonusBalanceByClientIdInterface::class, AddBonusBalanceByClientIdAction::class);
        $this->app->bind(RemoveBalanceByClientIdInterface::class, RemoveBalanceByClientIdAction::class);
        $this->app->bind(RemoveBonusBalanceByClientIdInterface::class, RemoveBonusBalanceByClientIdAction::class);

        $this->app->bind(GetClientGroupNameByIdsInterface::class, GetClientGroupNameByIdsAction::class);
        $this->app->bind(GetFirstClientGroupIdByClubIdInterface::class, GetFirstClientGroupIdByClubIdAction::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
