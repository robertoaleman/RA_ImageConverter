<?php

class ImageConverter
{
    public function convertToWebP()
    {
        $directory = getcwd(); // Obtiene el directorio actual
        $files = scandir($directory);

        foreach ($files as $file) {
            $filePath = $directory . '/' . $file;

            if ($this->isJpeg($filePath)) {
                $this->convertFileToWebP($filePath);
            }
        }
    }

    private function isJpeg($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        return in_array(strtolower($extension), ['jpg', 'jpeg']);
    }

    private function convertFileToWebP($filePath)
    {
        $image = imagecreatefromjpeg($filePath);

        if (!$image) {
            echo "No se pudo cargar la imagen: $filePath\n";
            return;
        }

        $webpPath = $this->getWebPPath($filePath);

        if (imagewebp($image, $webpPath)) {
            echo "Imagen convertida con éxito: $webpPath\n";
        } else {
            echo "Error al convertir la imagen: $filePath\n";
        }

        imagedestroy($image);
    }

    private function getWebPPath($filePath)
    {
        return preg_replace('/\.(jpg|jpeg)$/i', '.webp', $filePath);
    }
}

// Uso de la clase
try {
    $converter = new ImageConverter();
    $converter->convertToWebP();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}