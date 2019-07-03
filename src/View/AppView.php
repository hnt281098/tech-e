<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
use Cake\I18n\Time;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    public function calculateDatetime($postingDate = null)
    {
        $now = Time::now();
        $tmp = $now->diff($postingDate);
        if(!empty($tmp->y)){
            echo $tmp->y . " năm trước";
        }elseif (!empty($tmp->m)) {
            echo $tmp->m . " tháng trước";
        }elseif (!empty($tmp->d)) {
            echo $tmp->d . " ngày trước";
        }elseif (!empty($tmp->h)) {
            echo $tmp->h . " giờ trước";
        }elseif (!empty($tmp->i)) {
            echo $tmp->i . " phút trước";
        }elseif (!empty($tmp->s)) {
            echo $tmp->s . " giây trước";
        }
    }

    public function calculateAge($birthday = null)
    {
        $now = Time::now();
        $tmp = $now->diff($birthday);
        $age = $tmp->y;
        return $age;
    }

    public function paginator()
    {
        echo "<ul class='theme-pagination'>";
            echo $this->Paginator->first('<<');
            if($this->Paginator->hasPrev()){
                echo $this->Paginator->prev('<');
            }
            echo $this->Paginator->current();
            if($this->Paginator->hasNext()){
                echo $this->Paginator->next('>');
            }
            echo $this->Paginator->last('>>');
        echo "</ul>";
        echo $this->Paginator->counter([
            'format'=>'Đang ở trang {{page}} trong {{pages}} trang'
        ]);
    }
}