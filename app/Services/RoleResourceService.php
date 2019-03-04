<?php
/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 05/06/2017
 * Time: 10:41
 */

namespace App\Services;


class RoleResourceService
{
    public static function getResources(){
        return session('resources');
    }
    public static function getUserPermissions(){
        return session('permissions');
    }
    public static function canAccessRoute($route){
        if(empty($route)){
            throw new \Exception('The route must not be empty.');
        }
        $resources = session('resources');
        $permissions = session('permissions');
        if(!is_array($resources)){
            throw new \Exception('The resources was not found in the session.');
        }
        if(!is_array($permissions)){
            throw new \Exception('The user permissions was not found in the session.');
        }
        $resource_id = null;
        foreach($resources as $key =>$resource){
            if($resource['key'] ==$route)
                $resource_id = $resource['id'];
        }
        if(empty($resource_id)){
            throw new \Exception("The route ($route) you are accessing was not found in the resources. Please make sure the route is registered.");
        }
        return in_array($resource_id,$permissions);
    }
}