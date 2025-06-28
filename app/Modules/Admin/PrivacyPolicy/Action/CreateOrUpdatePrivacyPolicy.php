<?php

namespace App\Modules\Admin\PrivacyPolicy\Action;

use App\Models\PrivacyPolicy;
use App\Repositories\Interface\PrivacyPolicyInterface;

class CreateOrUpdatePrivacyPolicy
{
    protected $privacyPolicyRepo;

    public function __construct(PrivacyPolicyInterface $privacyPolicyRepo)
    {
        $this->privacyPolicyRepo = $privacyPolicyRepo;
    }

    public function execute(array $data): void
    {
        $existing = $this->privacyPolicyRepo->getLatest();

        if ($existing) {
            $this->privacyPolicyRepo->update($existing->id, $data);
        } else {
            $this->privacyPolicyRepo->create($data);
        }
    }
}
