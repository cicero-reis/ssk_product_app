<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ClientScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $user = authUser();

        if ($user?->client_id) {
            $builder->where('client_id', $user->client_id);
        }
    }
}
