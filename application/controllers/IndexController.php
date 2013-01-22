<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $tabla = new Zend_Db_Table("redam_respuestas");
        $registros = $this->_getParam("num", 400);
        
        $time = microtime(true);
        for( $i = 0; $i <= $registros; $i++ ) {
            $data = array(
                'pregunta_id'   => rand(1, 100),
                'sucursal_id'   => rand(1, 4),
                'aspecto_id'    => rand(1, 8),
                'supervisor_id' => rand(1, 3),
                'fecha'         => date('Y-m-d'),
                'val'           => rand(0, 4),
                'only_read'     => 0
            );
            $tabla->insert($data);
        }
        $total = microtime(true) - $time;
        
        $this->view->registros = $registros;
        $this->view->tiempo = $total;
        $this->view->datos = $tabla->fetchAll();
        
        $tabla->getAdapter()->query("TRUNCATE TABLE `redam_respuestas`");
    }


}

