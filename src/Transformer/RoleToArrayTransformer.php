<?php

namespace App\Transformer;


use Symfony\Component\Form\DataTransformerInterface;



class RoleToArrayTransformer implements DataTransformerInterface
{
	public function transform($roles): ?string
	{
		return $roles[0] ?? null;
	}

	public function reverseTransform($role): array
	{
		return [$role];
	}
}