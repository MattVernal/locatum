<?php

class UserDao {
    private $db= null;
    
    public function __destruct() {
        // close db connection
        $this->db = null;
    }
    /**
     * Find all {@link users}s by search criteria.
     * @return array array of {@link Booking}s
     */
    public function find($sql) {
        $result = array();
        foreach ($this->query($sql) as $row) {
            $user = new User();
            UserMapper::map($user, $row);
            $result[$user->getId()] = $user;
        }
        return $result;
    }
    
    
    
}
