<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subcategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubcategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_subcategory');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Subcategory $subcategory): bool
    {
        return $user->can('view_subcategory');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_subcategory');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Subcategory $subcategory): bool
    {
        return $user->can('update_subcategory');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Subcategory $subcategory): bool
    {
        return $user->can('delete_subcategory');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_subcategory');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Subcategory $subcategory): bool
    {
        return $user->can('force_delete_subcategory');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_subcategory');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Subcategory $subcategory): bool
    {
        return $user->can('restore_subcategory');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_subcategory');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Subcategory $subcategory): bool
    {
        return $user->can('replicate_subcategory');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_subcategory');
    }
}
