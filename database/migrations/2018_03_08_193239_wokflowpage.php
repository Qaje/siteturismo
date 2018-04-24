<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Wokflowpage extends Migration
{
    public function up()
    {           
        Schema::create('users',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');   
            $table->string('last_name',200);
            $table->string('first_name',100);
            $table->boolean('status');
            $table->string('ci_dni_id',20);
            $table->string('reside',200);
            $table->string('email',200)->unique();
            $table->date('date_born', 100);
            $table->string('photo', 100);
            $table->datetime('last_modification');
            $table->string('cellnumber',10);
            $table->timestamps();
        });
        //        responsable
        Schema::create('liables',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');   
            $table->string('nickname',200);
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->boolean('status');
            $table->string('ci',20);
            $table->string('ci_issued',20);
            $table->string('email',200);
            $table->date('date_born', 100);
            $table->string('photografic', 100);
            $table->datetime('last_modification');
            $table->string('cellnumber',10);
            $table->timestamps();
        });
        Schema::create('turistic_sites', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('name_title')->unsigned();
            $table->integer('summary')->unsigned();
            $table->string('description', 100);
            $table->string('how_to_come', 100);
            $table->string('recomendation', 100);
            $table->string('city', 100);
            $table->string('province', 100);
            $table->string('geolocalization_photo', 100);
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('photografic', 100);
            $table->timestamps();
        });
        Schema::create('announcements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('publication_date')->unsigned();
            $table->string('title',150);
            $table->string('content', 500);
            $table->string('how_to_come', 100); //hospedae
            $table->string('recomendation', 100);
            $table->string('geolocalization_photo', 100);
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('photorgrafic', 100);
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('publication_date')->unsigned();
            $table->string('title',150);
            $table->string('content', 500);
            $table->string('how_to_come', 100); 
            $table->string('recomendation', 100);
            $table->string('geolocalization', 100);
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('photorgrafic', 100);
            $table->string('author', 100);
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('events', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('begins_date');
            $table->time('begins_time');
            $table->date('ends_date');
            $table->time('ends_time');
            $table->string('title',150);
            $table->string('name', 500);
            $table->string('how_to_come', 100); 
            $table->string('recomendation', 100);
            $table->string('geolocalization_photo', 100);
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('photorgrafic', 100);
            $table->string('author', 100);
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('touristic_guides',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name',200);
                $table->string('direccion',200);
                $table->string('contact',20);
                $table->string('email_siteweb',40);
                $table->string('city', 100);
                $table->string('province', 100);
                $table->string('geolocalization_photo',100);
                $table->decimal('long', 10, 7);
                $table->decimal('lat', 10, 7);
                $table->integer('votes');
                $table->timestamps();
            });
        
        Schema::create('countries',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name',100);
                $table->string('geolocalization',200);
                $table->decimal('long', 10, 7);
                $table->decimal('lat', 10, 7);
        });
        Schema::create('cities',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name',100);
                $table->string('description',200);
                $table->string('geolocalization',200);
                $table->decimal('long', 10, 7);
                $table->decimal('lat', 10, 7);
                $table->integer('country_id')->unsigned();
                $table->foreign('country_id')->references('id')->on('countries');
           });
        Schema::create('provinces',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name',100);
                $table->string('geolocalization',200);
                $table->decimal('long', 10, 7);
                $table->decimal('lat', 10, 7);
                $table->integer('city_id')->unsigned();
                $table->foreign('city_id')->references('id')->on('cities');
        });
        Schema::create('categories',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',200);
            $table->string('description',200);
            $table->datetime('last_modification');
            $table->timestamps();
        });
        Schema::create('turistic_types_companies',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name',200);
                $table->string('description',200);
                $table->string('last_modification',20);
                $table->string('service_type',40);
                $table->timestamps();
            });
        Schema::create('categories_turistic_type_companies', function (Blueprint $table) {
                $table->integer('category_id')->unsigned();
                $table->integer('turistic_type_company_id')->unsigned();
                $table->foreign('category_id')
                      ->references('id')
                      ->on('categories')
                      ->onDelete('cascade');      
                $table->foreign('turistic_type_company_id')
                      ->references('id')
                      ->on('turistic_types_companies')
                      ->onDelete('cascade');
                $table->primary(['category_id','turistic_type_company_id']);
            });
        Schema::create('turistic_companies',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name_reasonsocial',200);
                $table->string('nit',100);
                $table->boolean('status');
                $table->string('email_siteweb',200);
                $table->string('photografic', 100);
                $table->datetime('last_modification');
                $table->string('observation',500);
                $table->integer('liable_id')->unsigned();
                $table->foreign('liable_id')->references('id')->on('liables');
                $table->timestamps();
            });
        Schema::create('offices',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('direccion',200);
                $table->string('description',200);
                $table->integer('country');
                $table->integer('city');
                $table->integer('province');
                $table->string('office_photo',100);
                $table->string('contact',200);
                $table->string('geolocalization',100);
                $table->decimal('long', 10, 7);
                $table->decimal('lat', 10, 7);
                
        });

        Schema::create('visitors',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('nationaliy',200);
                $table->string('reside',100);
                $table->string('last_name',200);
                $table->string('first_name',100);
                $table->string('email',200)->unique();
                $table->boolean('status');
                $table->date('date_born', 100);
                $table->string('geolocalization', 100);
                $table->decimal('long', 10, 7);
                $table->decimal('lat', 10, 7);
                $table->timestamps();
            });
        Schema::create('roles',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name',100);
                $table->string('description',200);
                $table->boolean('status');
                $table->rememberToken();
                $table->timestamps();
            });
        
        Schema::create('permissions',function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name',100);
                $table->string('description',200);
                $table->timestamps();
            });
            Schema::create('permission_role', function (Blueprint $table) {
                $table->integer('permission_id')->unsigned();
                $table->integer('role_id')->unsigned();
                $table->foreign('permission_id')
                      ->references('id')
                      ->on('permissions')
                      ->onDelete('cascade');
                $table->foreign('role_id')
                      ->references('id')
                      ->on('roles')
                      ->onDelete('cascade');
                $table->primary(['permission_id','role_id']);
            });
            Schema::create('role_user', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('role_id')->unsigned();
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');      
                $table->foreign('role_id')
                      ->references('id')
                      ->on('roles')
                      ->onDelete('cascade');
                $table->primary(['user_id','role_id']);
            });
            
        Schema::create('turistic_company_offices', function (Blueprint $table) {
                $table->integer('turistic_company_id')->unsigned();
                $table->integer('office_id')->unsigned();
                $table->foreign('turistic_company_id')
                      ->references('id')
                      ->on('turistic_companies')
                      ->onDelete('cascade');      
                $table->foreign('office_id')
                      ->references('id')
                      ->on('offices')
                      ->onDelete('cascade');
                $table->primary(['turistic_company_id','office_id']);
            });
            Schema::create('turistic_sites_province', function (Blueprint $table) {
                $table->integer('turistic_sites_id')->unsigned();
                $table->integer('province_id')->unsigned();
                $table->foreign('turistic_sites_id')
                      ->references('id')
                      ->on('turistic_sites')
                      ->onDelete('cascade');      
                $table->foreign('province_id')
                      ->references('id')
                      ->on('provinces')
                      ->onDelete('cascade');
                $table->primary(['turistic_sites_id','province_id']);
            });
            Schema::create('news_user', function (Blueprint $table) {
                $table->integer('news_id')->unsigned();
                $table->integer('users_id')->unsigned();
                $table->foreign('news_id')
                      ->references('id')
                      ->on('news')
                      ->onDelete('cascade');      
                $table->foreign('users_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
                $table->primary(['news_id','users_id']);
            });
            Schema::create('events_user', function (Blueprint $table) {
                $table->integer('events_id')->unsigned();
                $table->integer('users_id')->unsigned();
                $table->foreign('events_id')
                      ->references('id')
                      ->on('events')
                      ->onDelete('cascade');      
                $table->foreign('users_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
                $table->primary(['events_id','users_id']);
            });
            Schema::create('announcements_user', function (Blueprint $table) {
                $table->integer('announcements_id')->unsigned();
                $table->integer('users_id')->unsigned();
                $table->foreign('announcements_id')
                      ->references('id')
                      ->on('announcements')
                      ->onDelete('cascade');      
                $table->foreign('users_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
                $table->primary(['announcements_id','users_id']);
            });
    }
    public function down()
    {
        Schema::DropIfExists('liables');
        Schema::DropIfExists('users');
        Schema::DropIfExists('roles');
        Schema::DropIfExists('permissions');
        Schema::DropIfExists('role_user');
        Schema::DropIfExists('permission_role');
        Schema::DropIFExists('turistic_sites');
        Schema::DropIfExists('announcements');
        Schema::DropIfExists('news');
        Schema::DropIfExists('events');
        Schema::DropIfExists('touristic_guides');
        Schema::DropIfEXists('categories');
        Schema::DropIfExists('turistic_companies');
        Schema::DropIfExists('offices');
        Schema::DropIfExists('visitors');
        Schema::DropIfExists('cities');
        Schema::DropIfExists('countries');
        Schema::DropIfExists('turistic_company_offices');
        Schema::DropIFExists('turistic_types_company');
        Schema::DropIfExists('categories_turistic_type_companies');
        Schema::DropIfExists('news_user');
    }
}


