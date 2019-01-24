<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller
{
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $data = ['add_error' => ''];
        
        // Checks if input is empty or only contains whitespace
        if (isset($body['title']) && (trim($body['title']) !== '')) {
            $result = TodoItem::createTodo($body['title']);

            if ($result) {
                $this->redirect('/');
            }
        } else {
            // If input is incorrect, shows error message to user

            // Adds the todo items as data so they are still visible in the view
            $todos = TodoItem::findAll();
            $data['todos'] = $todos;

            // Adds the error message as data
            $data['add_error'] = 'Please enter something into the field';

            return $this->view('index', $data);
        }
    }

    public function update($urlParams)
    {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $completed = isset($body['status']) ? 1 : 0; // whether or not the todo has been checked or not

        // TODO: Implement me!
        // This action should update a specific todo item in the todos table using the TodoItem::updateTodo method.
        // Try and figure out what parameters you need to pass to the updateTodo-method in the TodoItem model.

        // if there's a result
          // use the redirect method to send the user back to the list of todos $this->redirect('/');
        // otherwise, throw an exception or show an error message
    }

    public function delete($urlParams)
    {
        $todoId = $urlParams['id'];
        TodoItem::deleteTodo($todoId);
        $this->redirect('/');
    }

    /**
     * OPTIONAL Bonus round!
     *
     * The two methods below are optional, feel free to try and complete them
     * if you're aiming for a higher grade.
     */
    public function toggle()
    {
        // (OPTIONAL) TODO: This action should toggle all todos to completed, or not completed.
    }

    public function clear()
    {
        // (OPTIONAL) TODO: This action should remove all completed todos from the table.
    }
}
