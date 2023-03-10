<?php

namespace App\Contracts;

/**
 *
 * User policy interface
 *
 */

interface AdminUserPolicy
{


    /**
     * Check if the user has at least one role.
     *
     * @param int|string|array $role
     * @return bool
     */
    public function hasRole($role);


    /**
     * Check if the user has the permission.
     *
     * @param int|string|array $permission
     * @return bool
     */
    public function canDo($permission);

}
