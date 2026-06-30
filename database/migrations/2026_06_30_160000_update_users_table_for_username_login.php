<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable()->unique()->after('name');
            }
        });

        if (Schema::hasColumn('users', 'email')) {
            DB::table('users')->whereNull('username')->update(['username' => 'admin']);
        }

        // Database lama boleh tetap menyimpan email; aplikasi UAS memakai username.
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable()->unique()->after('name');
            }
            if (! Schema::hasColumn('users', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable()->after('email');
            }
        });
    }
};
