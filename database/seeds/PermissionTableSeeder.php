<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [//user
                'name' => 'user-list',
                'display_name' => 'Display User Listing',
                'description' => 'See only Listing Of User'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit User',
                'description' => 'Edit User'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ]
        	[//role
        	 	'name' => 'role-list',
        	 	'display_name' => 'Display Role Listing',
        	 	'description' => 'See only Listing Of Role'
        	],
        	[
        	 	'name' => 'role-create',
        	 	'display_name' => 'Create Role',
        	 	'description' => 'Create New Role'
        	],
        	[
        	 	'name' => 'role-edit',
        	 	'display_name' => 'Edit Role',
        	 	'description' => 'Edit Role'
        	],
        	[
        	 	'name' => 'role-delete',
        	 	'display_name' => 'Delete Role',
        	 	'description' => 'Delete Role'
        	],
        	[//barang
        	 	'name' => 'barang-list',
        	 	'display_name' => 'Display Barang Listing',
        	 	'description' => 'See only Listing Of Barang'
        	],
        	[
        	 	'name' => 'barang-create',
        	 	'display_name' => 'Create Barang',
        	 	'description' => 'Create New Barang'
        	],
        	[
        	 	'name' => 'barang-edit',
        	 	'display_name' => 'Edit Barang',
        	 	'description' => 'Edit Barang'
        	],
        	[
        	 	'name' => 'barang-delete',
        	 	'display_name' => 'Delete Barang',
         	'description' => 'Delete Barang'
           ],
           [//pembeli
                'name' => 'pembeli-list',
                'display_name' => 'Display Pembeli Listing',
                 'description' => 'See only Listing Of Pembeli'
            ],
            [
                 'name' => 'pembeli-create',
                 'display_name' => 'Create Pembeli',
                 'description' => 'Create New Pembeli'
            ],
            [
                 'name' => 'pembeli-edit',
                 'display_name' => 'Edit Pembeli',
                 'description' => 'Edit Pembeli'
            ],
            [
                 'name' => 'pembeli-delete',
                 'display_name' => 'Delete Pembeli',
                 'description' => 'Delete Pembeli'
            ],
            [//supplier
                 'name' => 'supplier-list',
                 'display_name' => 'Display Supplier Listing',
                 'description' => 'See only Listing Of Supplier'
            ],
            [
                 'name' => 'supplier-create',
                 'display_name' => 'Create Supplier',
                 'description' => 'Create New Supplier'
            ],
            [
                'name' => 'supplier-edit',
                 'display_name' => 'Edit Supplier',
                 'description' => 'Edit Supplier'
            ],
            [
                 'name' => 'supplier-delete',
                'display_name' => 'Delete Supplier',
                'description' => 'Delete Supplier'
            ],
            [//pesan
                 'name' => 'pesan-list',
                 'display_name' => 'Display  Listing',
                 'description' => 'See only Listing Of Pesan'
            ],
            [
                 'name' => 'pesan-create',
                 'display_name' => 'Create Pesan',
                 'description' => 'Create New Pesan'
            ],
            [
                 'name' => 'pesan-edit',
                 'display_name' => 'Edit Pesan',
                 'description' => 'Edit Pesan'
            ],
            [
                 'name' => 'pesan-delete',
                 'display_name' => 'Delete Pesan',
                 'description' => 'Delete Pesan'
            ],
            [//realisasi
                 'name' => 'realisasi-list',
                 'display_name' => 'Display Realisasi Listing',
                 'description' => 'See only Listing Of Realisasi'
            ],
            [
                 'name' => 'realisasi-create',
                 'display_name' => 'Create Realisasi',
                 'description' => 'Create New Realisasi'
            ],
            [
                 'name' => 'realisasi-edit',
                 'display_name' => 'Edit Realisasi',
                 'description' => 'Edit Realisasi'
            ],
            [
                 'name' => 'realisasi-delete',
                 'display_name' => 'Delete Realisasi',
                 'description' => 'Delete Realisasi'
            ],
            [//user
                 'name' => 'penjualan-list',
                 'display_name' => 'Display Penjualan Listing',
                 'description' => 'See only Listing Of Penjualan'
            ],
            [
                 'name' => 'penjualan-create',
                 'display_name' => 'Create Penjualan',
                 'description' => 'Create New Penjualan'
            ],
            [
                 'name' => 'penjualan-edit',
                 'display_name' => 'Edit Penjualan',
                 'description' => 'Edit Penjualan'
            ],
            [
                 'name' => 'penjualan-delete',
                 'display_name' => 'Delete Penjualan',
                 'description' => 'Delete Penjualan'
            ]
        ]

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
