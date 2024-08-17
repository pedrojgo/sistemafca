<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('materials')){
            Schema::create('materials',  function (Blueprint $table){ 
                $table -> id();
                $table->string('name',50)->unique();
                $table ->boolean('active')->default(true);;
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrentOnUpdate();
            });
        }

        if(!Schema::hasTable('labs')){
            Schema::create('labs',  function (Blueprint $table){ 
                $table -> id();
                $table->string('name',100)->unique();
                $table->boolean('active')->default(true);;
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrentOnUpdate();
            });
        }

        if(!Schema::hasTable('courses')){
            Schema::create('courses',  function (Blueprint $table){ 
                $table -> id();
                $table->string('name',100)->unique();
                $table->boolean('active')->default(true);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrentOnUpdate();
            });
        }

        if(!Schema::hasTable('teachers')){
            Schema::create('teachers',  function (Blueprint $table){ 
                $table -> id();
                $table->string('name',50)->unique();
                $table->boolean('active')->default(true);;
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrentOnUpdate();
            });
        }

        if(!Schema::hasTable('students')){
            Schema::create('students',  function (Blueprint $table){ 
                $table -> id();
                $table -> string('uid')->unique();  
                $table -> foreignId('course_id')->nullable()->constrained()->onDelete('set null');   
                $table -> boolean('active')->default(true);;
                $table -> timestamp('created_at')->useCurrent();
                $table -> timestamp('updated_at')->useCurrentOnUpdate();
            });
        }

        if(!Schema::hasTable('attendances')){
            Schema::create('attendances',  function (Blueprint $table){ 
                $table -> id();
                $table -> foreignId('student_id')->nullable()->constrained()->onDelete('set null'); 
                $table -> foreignId('lab_id')->nullable()->constrained()->onDelete('set null');   
                $table -> foreignId('material_id')->nullable()->constrained()->onDelete('set null');  
                $table -> foreignId('teacher_id')->nullable()->constrained()->onDelete('set null');   
                $table -> boolean('active')->default(true);;
                $table -> timestamp('created_at')->useCurrent();
                $table -> timestamp('updated_at')->useCurrentOnUpdate();
            });
        }

        
        if(!Schema::hasTable('users')){
            Schema::create('users',  function (Blueprint $table){ 
                $table -> id();
                $table -> string('email')->unique();
                $table -> string('password');
                $table -> string('name')->unique();
                $table -> boolean('active')->default(true);;
                $table -> timestamp('created_at')->useCurrent();
                $table -> timestamp('updated_at')->useCurrentOnUpdate();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('attendances');
         Schema::dropIfExists('students');
         Schema::dropIfExists('labs');
         Schema::dropIfExists('courses');
         Schema::dropIfExists('teachers');
         Schema::dropIfExists('materials');
         Schema::dropIfExists('users');
    }
};
