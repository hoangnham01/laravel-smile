<?php

namespace App\Smile\Core;


interface BaseRepositoryInterface
{
    /**
     * @param array $filters
     * @param array $column
     *
     * @return \Illuminate\Support\Collection Model collections
     */
    public function getAll($filters = array(), $column = array('*'));

    /**
     * @param array $filters
     * @param array $column
     *
     * @return \Illuminate\Support\Collection Model collections
     */
    public function getFirst($filters = array(), $column = array('*'));

    /**
     * Get item of model. If model not exist then it will throw an exception
     *
     * @param array $columns
     * @param  int $id Model ID
     *
     * @return \Illuminate\Database\Eloquent\Model;
     */
    public function find($id, $columns = array('*'));

    /**
     * Get item of model
     *
     * @param array $columns
     * @param  int $id Model ID
     *
     * @return \Illuminate\Database\Eloquent\Model;
     */
    public function getById($id, $columns = array('*'));

    /**
     * Get items with filter & paginate
     *
     * @param  array $filters
     * @param        $pageSize
     * @param  array $columns
     *
     * @return \Illuminate\Support\Collection Model collections
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
    function createMultiple($data);

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
     * Create multiple record.
     * @param array $data
     * @return void
     */
}