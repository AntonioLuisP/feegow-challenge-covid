<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function model()
    {
        return $this->model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function update(array $data, $id, $attribute = null)
    {
        $user = $this->find($id);

        $user->name = $data['name'];

        $user->save();
    }

    public function generatePassword($qtyCaraceters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijkmnopqrstuvwxyz');
        $numbers = 1234567890;
        $characters = $smallLetters . $numbers;
        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
        return $password;
    }

    public function password($senha)
    {
        $user = Auth::user();
        $user->password = bcrypt($senha);
        $user->save();
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }

    public function restore($id)
    {
        $this->model->withTrashed()->find($id)->restore();
        return $this->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function lists($identifier, $field)
    {
        return $this->model->orderBy($identifier, 'desc')->pluck($field, $identifier);
    }

    public function listsOrdem($identifier, $field)
    {
        return $this->model->orderBy($field, 'asc')->pluck($field, $identifier);
    }

    public function getFillableModelFields()
    {
        return $this->model->getFillable();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function findWhere(array $data)
    {
        return $this->model->where($data);
    }

    public function findWhereIn($input, array $data)
    {
        return $this->model->whereIn($input, $data)->get();
    }

    public function where($field, $type, $value)
    {
        return $this->model->where($field, $type, $value);
    }

    public function whereDate($field, $operator, $date)
    {
        return $this->model->whereDate($field, $operator, $date);
    }

    public function search(array $options, array $select = null)
    {
        $query = $this->model;
        foreach ($options as $op) {
            $query = $query->where($op[0], $op[1], $op[2]);
        }

        if (!is_null($select)) {
            $query = $query->select(implode(',', $select));
        }

        return $query->get();
    }

    public function whereUnderWhere($sort, $search, $deleted, $relations)
    {
        if ($deleted) {
            $model = $this->model->onlyTrashed();
        } else {
            $model = $this->model;
        }

        $model = $model->with($relations);

        if (!empty($search)) {
            foreach ($search as $key => $value) {
                switch ($value['type']) {
                    case 'like':
                        $model = $model->where($value['field'], "i" . $value['type'], "%{$value['term']}%");
                        break;
                    default:
                        $model = $model->where($value['field'], $value['type'], $value['term']);
                }
            }
        }

        if (!empty($sort)) {
            $model = $model->orderBy($sort['field'], $sort['sort']);
        } else {
            $model = $model->orderBy('created_at', 'desc');
        }

        return $model;
    }

    public function request(array $requestParameters = null)
    {
        $sort = [];
        if (!empty($requestParameters['field']) and !empty($requestParameters['sort'])) {
            $sort = [
                'field' => $requestParameters['field'],
                'sort' => $requestParameters['sort'],
            ];
        }

        $searchable = $this->model->searchable();
        $search = [];
        foreach ($requestParameters as $key => $value) {
            if (array_key_exists($key, $searchable) and !empty($value)) {
                $search[] = [
                    'field' => $key,
                    'type' => $searchable[$key],
                    'term' => $value,
                ];
            }
        }
        return ['sort' => $sort, 'search' => $search];
    }

    public function bigSearch(array $requestParameters = null, $deleted = false, array $relations = [])
    {
        $request = $this->request($requestParameters);
        return $this->whereUnderWhere($request['sort'], $request['search'], $deleted, $relations);
    }
}
