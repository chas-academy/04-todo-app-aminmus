<?php

namespace Todo;

class TodoItem extends Model
{
    // Query Exection Format
    // methods: query($query); bind($param, $value, $type = null); execute();
    // self::$db->method();

    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    // Create a new todo
    public static function createTodo($title)
    {
        $sql = 'INSERT INTO todos (title, created)
                VALUES (:title, now())';
        
        try {
            self::$db->query($sql);
            self::$db->bind(':title', $title);
            $result = self::$db->execute();
        } catch (\Exception $e) {
            showExceptionMessage($e);
        }
        return $result;
    }

    // Update a specific todo
    public static function updateTodo($todoId, $title, $completed = null)
    {
        $sql = 'UPDATE todos SET title = :title, completed = :completed WHERE id = :todoId';

        try {
            self::$db->query($sql);
            self::$db->bind(':todoId', $todoId);
            self::$db->bind(':title', $title);
            self::$db->bind(':completed', $completed);
            $result = self::$db->execute();
        } catch (\Exception $e) {
            showExceptionMessage($e);
        }
        return $result;
    }

    // Delete a specific todo
    public static function deleteTodo($todoId)
    {
        $sql = 'DELETE FROM todos WHERE id = :todoId';

        try {
            self::$db->query($sql);
            self::$db->bind(':todoId', $todoId);
            self::$db->execute();
        } catch (\Exception $e) {
            showExceptionMessage($e); // Might only be visible if page is not redirected via TodoController
        }
    }
    
    // (Optional bonus methods below)
    // public static function toggleTodos($completed)
    // {
    //     // TODO: Implement me!
    //     // This is to toggle all todos either as completed or not completed
    // }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }
}
