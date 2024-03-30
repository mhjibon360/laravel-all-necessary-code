  // laravel role and permission spatie permission


  /**
  * get permission by group
  */

  public static function getpermissionGroups()
  {
  $getpermission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
  return $getpermission_groups;
  } // End Method

  /**
  * get permission by group name
  */

  public static function getpermissionbyGroupsName($group_name)
  {
  $permissions = DB::table('permissions')->select('id', 'name')->where('group_name', $group_name)->get();
  return $permissions;
  } // End Method

  /**
  * role has permission permission by group/name
  */

  public static function roleHasPermissions($role, $permissions)
  {
  $hasPermission = true;
  foreach ($permissions as $permission) {
  if (!$role->hasPermissionTo($permission->name)) {
  $hasPermission = false;
  return $hasPermission;
  }
  return $hasPermission;
  }
  } // End Method


  //edited time select group
  {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}
  <input class="form-check-input" type="checkbox" value="" id="group_name{{ $group->group_name }}"
      {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>

  //edited time select group_name
  {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
  <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="permission_id{{ $permission->id }}"
      name="permission_id[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
