<?php
/**
 * Function helper of project
 */

if(!function_exists('listPerPage')){
    function listPerPage(){
        return [15,25,50,100];
    }
}
if (!function_exists('formPerPage')) {
    function formPerPage()
    {
        $listPerPage = listPerPage();
        $form = '';
        foreach ($listPerPage as $item) {
            $form .= '<option value="' . $item . '"' . (request('per_page', 15) == 15 ? ' checked="checked"' : '') . '>' . $item . '</option>';
        }
        return '<label>Show <select class="form-control input-sm smile-per-page" name="per_page">' . $form . '</select> entries</label>';
    }
}
if (!function_exists('showPaginate')) {
    /**
     *
     *  @param Illuminate\Pagination\Paginator $results
     * @return string
     */
    function showPaginate($results)
    {
        $from = ($results->currentPage() - 1) * $results->perPage() + 1;
        $to = $from + $results->count() - 1;
        return trans('pagination.label', ['from' => $from, 'to' => $to, 'total'=> $results->total()]);
    }
}
