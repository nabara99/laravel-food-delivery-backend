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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('password');
            $table->string('address')->nullable()->after('phone');
            $table->string('roles')->default('user')->after('address');
            $table->string('license_plate')->nullable()->after('roles');
            $table->string('restaurant_name')->nullable()->after('license_plate');
            $table->string('restaurant_address')->nullable()->after('restaurant_name');
            $table->string('photo')->nullable()->after('restaurant_address');
            $table->string('latlong')->nullable()->after('photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'address', 'roles', 'license_plate', 'restaurant_name', 'restaurant_address', 'photo', 'latlong']);
        });
    }
};
