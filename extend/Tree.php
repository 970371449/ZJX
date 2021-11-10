<?php
/**
<<<<<<< HEAD
 *  created Date 2021-11-09 22:55:00
=======
 *  created Date 2021-10-29 22:55:00
>>>>>>> parent of 09e6982... Delete thinkphp directory
 *  author JC
 */

class Tree
{
    public function treeList($cate,$name='child',$pid=0)
    {
        $arr = array();
        foreach ($cate as $key => $v) {
            if ($v['pid'] == $pid) {
                $v[$name] =  $this->treeList($cate,$name,$v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }

}