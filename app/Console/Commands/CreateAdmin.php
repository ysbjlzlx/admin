<?php

namespace App\Console\Commands;

use App\Http\Logics\Admin\AdminLogic;
use Illuminate\Console\Command;
use OTPHP\TOTP;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '添加 Admin 管理员';
    private $adminLogic;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AdminLogic $adminLogic)
    {
        parent::__construct();
        $this->adminLogic = $adminLogic;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $totp = TOTP::create();
        $admin = [
            'username' => 'admin',
            'email' => 'admin@ysbjlzlx.com',
            'password' => '123456',
            'totpSecret' => $totp->getSecret(),
        ];
        $result = $this->adminLogic->createAdmin($admin);
        if (is_bool($result) && false === $result) {
            $this->error('用户已存在');

            return 1;
        }
        $this->table(array_keys($admin), [$admin]);

        return 0;
    }
}
