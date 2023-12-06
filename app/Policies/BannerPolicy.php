<?php

namespace App\Policies;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BannerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->can('banners.index') ? Response::allow() :
            Response::deny('you dont have permission to visit banners');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Banner $banner): Response
    {
        return $user->hasPermissionTo('banners.show') ? Response::allow() :
            Response::deny('you dont have permission to visit banner');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->hasPermissionTo('banners.create') ? Response::allow() :
            Response::deny('you dont have permission to create banner');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Banner $banner): Response
    {
        return $user->hasPermissionTo('banners.edit') ? Response::allow() :
            Response::deny('you dont have permission to edit banner');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Banner $banner): Response
    {
        return $user->hasPermissionTo('banners.delete') ? Response::allow() :
            Response::deny('you dont have permission to delete banner');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Banner $banner): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Banner $banner): bool
    {
        //
    }
}
