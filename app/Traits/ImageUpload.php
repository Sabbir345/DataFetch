<?php

namespace App\Traits;
use Intervention\Image\Facades\Image;

trait ImageUpload {
	
	public function getImageLink($data)
	{
		$fileName = strtotime(date('Y-m-d H:i:s')) . "-" . str_replace(' ', '-', $data->getClientOriginalName());
		$destinationPath = public_path( 'uploads/avatar/' . $fileName );
		Image::make( $data->getRealPath() )->resize(
			300,
			null,
			function ( $constraint ) {
				$constraint->aspectRatio();
			}
		)->save( $destinationPath );

		$avatarLink = url( 'uploads/avatar/' . $fileName );

		return $avatarLink;
	}
	
}