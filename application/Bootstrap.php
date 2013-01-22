<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDatabaseProfiler()
    {
        $this->bootstrap("db");
        $db = $this->getResource("db");
        $db->setFetchMode(Zend_Db::FETCH_OBJ);
        if ('development' == $this->getEnvironment()) {
            $profiler = new Zend_Db_Profiler_Firebug('All DB Queries');
            $profiler->setEnabled(true);
            $db->setProfiler($profiler);
        }
    }

}

