<?php
if (!function_exists('customRouteName')) {
    function customRouteName($name, $prefix = BACKEND_PREFIX, $only = array())
    {
        $prefix = empty($prefix) ? '' : $prefix . '.';
        $routerName = [
            'index'   => $prefix . $name . '.index',
            'show'    => $prefix . $name . '.show',
            'create'  => $prefix . $name . '.create',
            'store'   => $prefix . $name . '.store',
            'edit'    => $prefix . $name . '.edit',
            'update'  => $prefix . $name . '.update',
            'destroy' => $prefix . $name . '.destroy',
        ];
        if (!empty($only)) {
            foreach ($only as $val) {
                unset($routerName[$val]);
            }
        }
        return $routerName;
    }
}
if (!function_exists('checkRoute')) {
    function checkRoute($name)
    {
        // Cần check xem có quyền truy cập hay không?
        return true;
    }
}

if (!function_exists('linkActive')) {

    function linkActive($slug = null, $prefix = null)
    {
        if (!is_null($slug) && is_array($slug)) {
            foreach ($slug as $value) {
                if (request()->is($prefix . $value)) {
                    return 'active';
                }
            }
        } else {
            if (request()->is($prefix . $slug) || (empty($slug) && request()->is(BACKEND_PREFIX))) {
                return 'active';
            }
        }
        return '';
    }
}

if (!function_exists('createSubMenuItemBackend')) {
    function createSubMenuItemBackend($data)
    {
        $html = '';
        if (is_array($data)) {
            foreach ($data as $item) {
                if (!empty($item['lang']) && Lang::has($item['lang'])) {
                    $item['title'] = trans($item['lang']);
                }
                $item['active'] = isset($item['active']) ? $item['active'] : '/';
                if (empty($item['sub'])) {
                    if (isset($item['active'])) {
                        $className = linkActive($item['active'], BACKEND_PREFIX);
                    } else {
                        $className = '';
                    }
                    if (isset($item['url'])) {
                        $html .= '<li class="' . $className . '"><a href="' . $item['url'] . '" ' . (isset($item['target']) ? 'target="' . $item['target'] . '"' : '') . '>' . $item['title'] . '</a></li>';
                    } else {
                        $item['param'] = isset($item['param']) && is_array($item['param']) ? $item['param'] : array();
                        if (checkRoute($item['route'])) {
                            $html .= '<li class="' . $className . '"><a href="' . route($item['route'], $item['param']) . '" ' . (isset($item['target']) ? 'target="' . $item['target'] . '"' : '') . '>' . $item['title'] . '</a></li>';
                        }
                    }
                } else {
                    $tmp = createSubMenuItemBackend($item['sub']);
                    $html .= empty($tmp) ? '' : '<li class="' . linkActive($item['active'], BACKEND_PREFIX) . '"><a href="return javascript:void(0);">' . $item['title'] . '</a><ul class="nav child_menu">' . $tmp . '</ul></li>';
                }
            }
        }
        return empty($html) ? $html : '<ul class="nav child_menu">' . $html . '</ul>';
    }
}


if (!function_exists('createMenuItemBackend')) {
    function createMenuItemBackend($item)
    {
        $html = '';
        if (isset($item['sub'])) {
            if (!empty($item['lang']) && Lang::has($item['lang'])) {
                $item['title'] = trans($item['lang']);
            }
            $item['active'] = isset($item['active']) ? $item['active'] : '/';
            $html = createSubMenuItemBackend($item['sub']);
            if (!empty($html)) {
                $html = '<li class="' . linkActive($item['active'], BACKEND_PREFIX) . '"><a><i class="' . $item['icon'] . '"></i>' . $item['title'] . ' <span class="fa fa-chevron-down"></span></a>' . $html . '</li>';
            }
        } elseif (isset($item['url'])) {
            $html = '<li class="' . linkActive($item['active'], BACKEND_PREFIX) . '"><a href="' . $item['url'] . '" ' . (isset($item['target']) ? 'target="' . $item['target'] . '"' : '') . '><i class="' . $item['icon'] . '"></i>' . $item['title'] . '</a></li>';
        } else {
            $item['param'] = isset($item['param']) && is_array($item['param']) ? $item['param'] : array();
            if (checkRoute($item['route'])) {
                $html = '<li class="' . linkActive($item['active'], BACKEND_PREFIX) . '"><a href="' . route($item['route'], $item['param']) . '" ' . (isset($item['target']) ? 'target="' . $item['target'] . '"' : '') . '><i class="' . $item['icon'] . '"></i>' . $item['title'] . '</a></li>';
            }
        }

        return $html;
    }
}
/*Form*/
if (!function_exists('formHasError')) {
    function formHasError($key, $className = ' has-error')
    {
        if (Session::get('errors') instanceof \Illuminate\Support\ViewErrorBag) {
            return Session::get('errors')->has($key) ? $className : null;
        }
        return null;
    }
}

if (!function_exists('formAlertError')) {
    function formAlertError($key)
    {
        $errors = Session::get('errors');
        if ($errors instanceof \Illuminate\Support\ViewErrorBag) {
            return $errors->has($key) ? $errors->first($key, '<ul class="list-unstyled parsley-errors-list filled"><li class="parsley-required">:message</li></ul>') : null;
        }
        return null;
    }
}
if (!function_exists('getCurrentRouteName')) {
    /**
     *  Get current route name
     * */
    function getCurrentRouteName()
    {
        return Request::route()->getName();
    }
}
if (!function_exists('uploadDirectory')) {
    function uploadDirectory($pathPrefix)
    {
        $path = $pathPrefix;
        $uploadPath = public_path('/');
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath . $path);
        }
        $path .= date('Y') . '/';
        if (!File::isDirectory($uploadPath . $path)) {
            File::makeDirectory($uploadPath . $path);
        }
        $path .= date('m') . '/';
        if (!File::isDirectory($uploadPath . $path)) {
            File::makeDirectory($uploadPath . $path);
        }
        return $path;
    }
}
if (!function_exists('uploadFile')) {
    function uploadFile($name, $pathPrefix, $fileName = null)
    {
        $path = uploadDirectory($pathPrefix);
        if (request()->hasFile($name)) {
            $file = request()->file($name);
            $fileName = is_null($fileName) ? str_random() . '_' . date('d-m-y') . '.' . $file->getClientOriginalExtension() : $fileName;
            $file->move(public_path($path), $fileName);
        }

        return $path . $fileName;
    }
}
if (!function_exists('removeFile')) {
    function removeFile($name)
    {
        if (File::exists($name)) {
            File::delete($name);
        }
    }
}


////////////////////////////////////////////////////////////////////////


/**
 * Display label status
 *
 * @param string $text
 * @param string $type
 *
 * @return string
 */
function getLabelStatus($text, $type = 'default')
{
    return '<span class="label label-' . $type . '">' . $text . '</span>';
}


function theExcerpt($text, $strLen = 255, $more = '...')
{
    $text = strip_tags($text);
    $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
    return str_limit($sanitized, $strLen, $more);
}

function displayDatetime($date, $format = 'd-m-Y H:i:s')
{
    return date($format, strtotime($date));
}

function displayDate($date, $format = 'd-m-Y')
{
    return date($format, strtotime($date));
}


function numberFormat($number, $decimals = 0, $dec_point = ',', $thousands_sep = '.')
{
    return number_format($number, $decimals, $dec_point, $thousands_sep);
}

if (!function_exists('getallheaders')) {
    function getallheaders()
    {
        if (empty($_SERVER) || !is_array($_SERVER)) {
            return array();
        }

        $headers = array();
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

function getLang($key, $default = null, $replace = [], $locale = null)
{
    $default = $default === null ? $key : $default;
    return Lang::has($key) ? Lang::get($key, $replace, $locale) : $default;
}

function timeAgo($created_at)
{
    return \Carbon\Carbon::createFromTimeStamp(strtotime($created_at))->diffForHumans();
}

function checkRole($role)
{
    return IZeeRole::checkRole($role);
}

function hasRole($role)
{
    IZeeRole::hasRole($role);
}

function checkRouteAccess($route)
{
    return IZeeRole::checkRouteAccess($route);
}

function hashRouteAccess($route)
{
    IZeeRole::hashRouteAccess($route);
}

function getSortBy($allow = array())
{
    $request = request()->only(['sort', 'order_by']);
    if (!in_array($request['sort'], $allow)) {
        return array();
    }
    $orderBy = strtolower($request['order_by']) == 'asc' ? 'asc' : 'desc';
    return ['type' => ORDER_BY, 'column' => $request['sort'], 'value' => $orderBy];
}

function btnShow($route, $parameters = array())
{
    return '<a data-toggle="tooltip" title="' . trans('form.btn.show') . '" class="btn btn-xs btn-info btn-action" href="' . route($route, $parameters) . '"><i class="fa fa-eye"></i></a>';
}

function btnEdit($route, $parameters = array())
{
    return '<a data-toggle="tooltip" title="' . trans('form.btn.edit') . '" class="btn btn-xs btn-warning btn-edit" href="' . route($route, $parameters) . '"><i class="fa fa-pencil-square-o"></i></a>';
}

function btnDelete($route, $parameters = array())
{
    return '<a data-toggle="tooltip" title="' . trans('form.btn.delete') . '" class="btn btn-xs btn-danger btn-destroy" data-href="' . route($route, $parameters) . '" href="javascript: void(0);"><i class="fa fa-trash"></i></a>';
}

function showPaginationFilter($route, $perPage = NUM_PER_PAGE, $parameters = array())
{
    $parameters['page'] = 1;
    $filter = [15, 20, 25, 50, 100, 150,];
    $html = '<div class="btn-group">';
    $html .= '<button data-toggle="dropdown" class="btn btn-default">' . trans('pagination.display', ['record' => $perPage]) . ' <b class="caret"></b></button>';
    $html .= '<ul role="menu" class="dropdown-menu animated fadeInDown">';
    foreach ($filter as $item) {
        $parameters['per_page'] = $item;
        $html .= '<li><a href="' . route($route, $parameters) . '">' . trans('pagination.display', ['record' => $item]) . '</a></li>';
    }
    $html .= '</ul></div>';
    return $html;
}

function showSortBy($title, $route, $column, $parameters = array())
{
    $parameters['sort'] = $column;
    if (request()->input('sort') == $column) {
        $orderBy = strtolower(request()->input('order_by'));
        if ($orderBy == 'asc') {
            $parameters['order_by'] = 'desc';
            return '<a class="active th-link" href="' . route($route, $parameters) . '">' . $title . ' <i class="fa fa-sort-asc"></i></a>';
        } else {
            $parameters['order_by'] = 'asc';
            return '<a class="active th-link" href="' . route($route, $parameters) . '">' . $title . ' <i class="fa fa-sort-desc"></i></a>';
        }
    } else {
        $parameters['order_by'] = 'desc';
        return '<a class="th-link" href="' . route($route, $parameters) . '">' . $title . ' <i class="fa fa-sort"></i></a>';
    }
}

function izWriteLog(Exception $e)
{
    Log::error('#####Exception:', [
        'file'    => $e->getFile(),
        'line'    => $e->getLine(),
        'code'    => $e->getCode(),
        'message' => $e->getMessage(),
    ]);
}

/**
 * Replace variable template email
 * @param $keys
 * @param $content
 * @return mixed
 */
function replaceTemplateMail($keys, $content)
{
    if (empty($keys)) {
        return $content;
    }
    foreach ($keys as $key) {
        $content = str_replace('{' . $key . '}', sprintf('{{$%s}}', $key), $content);
    }
    return $content;
}

/**
 * Replace variable subject mail
 * @param       $key
 * @param array $value
 * @return mixed
 */
function replaceSubjectMail($key, array $value)
{
    $template = config('email-template.' . $key);
    if (empty($template) || empty($template['keys'])) {
        return $template['subject'];
    }
    $keys = array_keys($template['keys']);
    $subject = $template['subject'];
    foreach ($keys as $key) {
        $subject = str_replace('{' . $key . '}', !empty($value[$key]) ? $value[$key] : '', $subject);
    }
    return $subject;
}

/**
 * Get code tracking email
 * @param array $params
 * @param       $routeName
 * @return string
 */
function getTemplateTrackingEmail(array $params, $routeName)
{
    if (empty($params) || empty($routeName)) {
        return '';
    }
    return route($routeName, $params);
}


/**
 * HELPER FOR UPLOAD FILE
 */

function getPathUploadFile($path)
{
    if (!File::isDirectory(public_path($path))) {
        File::makeDirectory(public_path($path), 0777, true);
    }
    $path .= date('Y');
    if (!File::isDirectory(public_path($path))) {
        File::makeDirectory(public_path($path), 0777, true);
    }
    $path .= '/' . date('m');
    if (!File::isDirectory(public_path($path))) {
        File::makeDirectory(public_path($path), 0777, true);
    }
    return $path;
}

function getRandomFileName($name, $ext)
{
    return date('YmdHi') . '-' . sha1(uniqid() . $name) . '.' . $ext;
}


function uploadArrayFile($request, $fieldName, array $fileLists, $path, $filename = array())
{
    $files = $request->file($fieldName);
    $pathRoot = $path;
    if (is_array($files)) {
        $fileLists = empty($fileLists) ? array_keys($files) : $fileLists;
        foreach ($fileLists as $val) {
            if (empty($files[$val])) {
                $data[$val] = null;
            } else {
                if (is_array($files[$val])) {
                    $tmp = array();
                    foreach ($files[$val] as $key => $item) {
                        $filename = getRandomFileName($item->getClientOriginalName(), $item->getClientOriginalExtension());
                        $path = getPathUploadFile($pathRoot);
                        $item->move(public_path($path), $filename);
                        $tmp[$key] = $path . '/' . $filename;
                    }
                    $data[$val] = $tmp;
                } else {
                    $filename = empty($filename[$val]) ? getRandomFileName($files[$val]->getClientOriginalName(), $files[$val]->getClientOriginalExtension()) : $filename[$val];
                    $path = getPathUploadFile($pathRoot);
                    $files[$val]->move(public_path($path), $filename);
                    $data[$val] = $path . '/' . $filename;
                }
            }
        }
    } else {
        foreach ($fileLists as $val) {
            $data[$val] = null;
        }
    }
    return $data;
}

function removeFile($path)
{
    if (File::exists(public_path($path))) {
        File::delete(public_path($path));
    }
}

function array_remove_keys(array &$array, array $keys)
{
    foreach ($keys as $key) {
        unset($array[$key]);
    }
}

/*-----------------------------------------------------------------------------------------------------------
 *  JSON FUNCTION
 *-----------------------------------------------------------------------------------------------------------
 */

function sanitizeSetValue($value)
{
    return !empty($value) && is_array($value) ? json_encode($value) : $value;
}

function sanitizeGetValue($value)
{
    return !empty($value) && json_decode($value, true) ? json_decode($value, true) : $value;
}

/*-----------------------------------------------------------------------------------------------------------
 *  FILE FUNCTION
 *-----------------------------------------------------------------------------------------------------------
 */

function cleanNumberPhone($phone)
{
    $phone = str_replace('.', '', $phone);
    $phone = str_replace(' ', '', $phone);
    return $phone;
}

function getDataFormSearch()
{
    $request = app('Illuminate\Http\Request');
    $data = $request->only(array('page', 'sort', 'orderBy', 'per-page', 'search', 'filter', 'filter1', 'filter2', 'filter3', 'filter4', 'advanced'));
    $data['per-page'] = (int)$data['per-page'] < NUM_PER_PAGE ? NUM_PER_PAGE : (int)$data['per-page'];
    $data['per-page'] = $data['per-page'] > 100 ? 100 : $data['per-page'];
    $data['orderBy'] = strtolower((string)$data['orderBy']) === 'asc' ? 'asc' : 'desc';
    return $data;
}

/***********************************************************************************************************************
 * ARRAY FUNCTION
 **********************************************************************************************************************/


/**
 * @param $array
 * @param $id
 * @return array
 */
function getItemArrayById($array, $id)
{
    if (empty($array)) {
        return [];
    }
    $find = array_where($array, function ($key, $value) use ($id) {
        return $value['id'] == $id;
    });
    return !empty($find) ? end($find) : [];
}

if (!function_exists('cache')) {
    function cache($key, $default = null)
    {
        return Cache::get($key, $default);
    }
}

function putCache($key, $value, $minutes)
{
    Cache::put($key, $value, $minutes);
}

function forgotCache($key)
{
    Cache::forget($key);
}

function getRouteName()
{
    return Request::route()->getName();
}

// Add class menu selected sidebar
function activeItemSidebar($slug = null)
{
    if (!is_null($slug) && is_array($slug)) {
        foreach ($slug as $value) {
            if (Request::is(BACKEND_PREFIX . '/' . $value)) {
                return ' active';
            }
        }
    } else {
        if (Request::is(BACKEND_PREFIX . '/' . $slug) || (is_null($slug) && Request::is(BACKEND_PREFIX . $slug))) {
            return ' active';
        }
    }
    return '';
}

if (!function_exists('checkAccess')) {
    /**
     * @param array | string $permission
     *
     * @return bool
     */
    function checkAccess($permission)
    {
        return true;
        return IZeeRole::checkRouteAccess($permission);
    }
}

/**
 * Check and Generate a URL to a named route.
 *
 * @param  string $name
 * @param  array  $parameters
 * @param  bool   $bool
 *
 * @return string|bool
 */
function checkAccessRoute($name, $parameters = array(), $bool = false)
{
    if (checkAccess($name)) {
        return route($name, $parameters);
    }
    return $bool ? false : 'javascript:void(0);';;

}
