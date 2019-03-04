<?php
/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 10/05/2017
 * Time: 13:26
 */

namespace App\Services\constants;


use App\Services\ConstantService;

class RoleResourceConstantService extends ConstantService
{
    const RESOURCE_INDEX =self::BASE_PATH . "roleresource/resources";
    const ROLE_INDEX =self::BASE_PATH . "roleresource/roles";
    const ROLE_CREATE = self::BASE_PATH .'roleresource/createrole';
    const ROLE_RESOURCES =  self::BASE_PATH .'roleresource/roleResources';
    const ADD_RESOURCES_TO_ROLE =  self::BASE_PATH .'roleresource/addResourceToRole';
    const ROLE_USERS =  self::BASE_PATH .'roleresource/roleusers';
    const ADD_USER_TO_ROLE = self::BASE_PATH .'roleresource/addUserToRole';
    const REFRESH_RESOURCES =  self::BASE_PATH .'roleresource/refreshResources';
    const RESOURCE_USERS = self::BASE_PATH .'roleresource/userResources' ;
    const SEARCH_LIST_OF_USERS = self::BASE_PATH .'roleresource/searchListOfUsers';
    const RESOURCE_CREATE = self::BASE_PATH .'roleresource/createResource';
    const RESOURCE_EDIT = self::BASE_PATH .'roleresource/editResource';
    const RESOURCE_DELETE =self::BASE_PATH .'roleresource/deleteResource';

}