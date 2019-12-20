<?php

class GetUser {
    public function getSessionUser() {
        session_start();
        return 'Flavio';
    }
}
