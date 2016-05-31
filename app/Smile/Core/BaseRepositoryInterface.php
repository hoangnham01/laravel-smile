<?php

namespace App\Smile\Core;


interface BaseRepositoryInterface
{
    /**
     * @param array $filters
     * @param array $column
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($filters = array(), $column = array('*'));

    /**
     * @param array $filters
     * @param array $column
     *
     * @return \Illuminate\Database\Eloquent\Model|static|null
     */
    public function getFirst($filters = array(), $column = array('*'));

    /**
     * Get item of model. If model not exist then it will throw an exception
     *
     * @param array $columns
     * @param  int $id Model ID
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find($id, $columns = array('*'));

    /**
     * Get item of model
     *
     * @param array $columns
     * @param  int $id Model ID
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function getById($id, $columns = array('*'));

    /**
     * Get items with filter & paginate
     *
     * @param  array $filters
     * @param        $pageSize
     * @param  array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws \InvalidArgumentException
     */
    public function getAllWithPaginate($filters = [], $pageSize = NUM_PER_PAGE, $columns = ['*']);

    /**
     * Create a new model
     *
     * @param  array $attributes
     *
     * @return static
     */
    public function create($attributes);
    /**
     * Create multiple model
     *
     * @param  array $data
     *
     * @return mixed
     */
    function createMultiple(array $data);

    /**
     * Update an exitst model
     *
     * @param  array $attributes
     * @param  array $conditions
     *
     * @return bool|int
     */
    public function update($attributes, $conditions = []);

    /**
     * Delete an exist model
     *
     * @param array $condition
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete($condition);

    /**
     * @param array $conditions
     * @param string $column
     *
     * @return mixed
     */
    public function count($conditions = array(), $column = 'id');

    /**
     * Increment a column's value by a given amount.
     *
     * @param  array $conditions
     * @param  string $column
     * @param  int $amount
     * @param  array $extra
     *
     * @return int
     */
    public function increment($conditions = array(), $column, $amount = 1, array $extra = []);

    /**
     * Decrement a column's value by a given amount.
     *
     * @param  array $conditions
     * @param  string $column
     * @param  int $amount
     * @param  array $extra
     *
     * @return int
     */
    public function decrement($conditions = array(), $column, $amount = 1, array $extra = []);

    /**
     * Start a new database transaction.
     *
     * @return void
     */
    function beginTransaction();

    /**
     * Commit the active database transaction.
     *
     * @return void
     */
    function commit();

    /**
     * Rollback the active database transaction.
     *
     * @return void
     */
    function rollBack();

    /**
     * @return int
     */
    public function getPerPage();
}