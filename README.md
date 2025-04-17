<h2><span>Class documentation </span><code>RA ImageConverter Jpg/Jpeg To WebP</code></h2>
<h3><span>Description</span></h3>
<span>The class  </span><code>RA ImageConverter Jpg/Jpeg To WebP</code><span> is designed to convert image files with extensions  </span><code>.jpg</code><span> and  </span><code>.jpeg</code><span> to the WebP format. It works in the current directory where the script is running, without the need to specify additional paths.</span>
<h3><span>Requirements</span></h3>
<ul>
 	<li><strong><span>PHP 7.4 or higher</span></strong><span> .</span></li>
 	<li><span>The extension  </span><code>GD</code><span> is enabled on the PHP server, as it is used to work with images.</span></li>
 	<li><span>Read and write permissions on the directory where the script is executed.</span></li>
</ul>

<hr />

<h3><span>Class methods</span></h3>
<h4><code>convertToWebP()</code></h4>
<span>Converts all files  </span><code>.jpg</code><span> in  </span><code>.jpeg</code><span> the current directory to WebP format. </span><strong><span>Parameters:</span></strong><span> None. </span><strong><span>Return:</span></strong><span> No return value. Prints messages to standard output indicating the conversion status of each file. </span><strong><span>How it works:</span></strong>
<ol>
 	<li><span>Gets the current directory ( </span><code>getcwd()</code><span>).</span></li>
 	<li><span>Scans all files in the ( </span><code>scandir()</code><span>) directory.</span></li>
 	<li><span>Check if each file has the extension  </span><code>.jpg</code><span> or  </span><code>.jpeg</code><span> using the private method  </span><code>isJpeg()</code><span>.</span></li>
 	<li><span>Converts valid files to WebP format using the private method  </span><code>convertFileToWebP()</code><span>.</span></li>
</ol>

<hr />

<h4><code>isJpeg($filePath)</code></h4>
<span>Checks if a file has the extension  </span><code>.jpg</code><span> or  </span><code>.jpeg</code><span>. </span><strong><span>Parameters:</span></strong>
<ul>
 	<li><code>$filePath</code><span> (string): Full path of the file to be verified.</span></li>
</ul>
<strong><span>Return:</span></strong>
<ul>
 	<li><code>true</code><span> if the file has the extension  </span><code>.jpg</code><span> or  </span><code>.jpeg</code><span>.</span></li>
 	<li><code>false</code><span> otherwise.</span></li>
</ul>

<hr />

<h4><code>convertFileToWebP($filePath)</code></h4>
<span>Converts a file  </span><code>.jpg</code><span> to  </span><code>.jpeg</code><span> WebP format and saves it in the same directory with the  </span><code>.webp</code><span>. extension. </span><strong><span>Parameters:</span></strong>
<ul>
 	<li><code>$filePath</code><span> (string): Full path of the file to be converted.</span></li>
</ul>
<strong><span>Return:</span></strong><span> Does not return values. Prints a message indicating whether the conversion was successful or an error occurred. </span><strong><span>How it works:</span></strong>
<ol>
 	<li><span>Load the image using  </span><code>imagecreatefromjpeg()</code><span>.</span></li>
 	<li><span>Generates the new file name with the extension  </span><code>.webp</code><span> using the private method  </span><code>getWebPPath()</code><span>.</span></li>
 	<li><span>Convert the image to WebP format using  </span><code>imagewebp()</code><span>.</span></li>
 	<li><span>Free the memory used by the image with  </span><code>imagedestroy()</code><span>.</span></li>
</ol>

<hr />

<h4><code>getWebPPath($filePath)</code></h4>
<span>Generates the path of the new file with the extension  </span><code>.webp</code><span>. </span><strong><span>Parameters:</span></strong>
<ul>
 	<li><code>$filePath</code><span> (string): Full path to the original file.</span></li>
</ul>
<strong><span>Return:</span></strong>
<ul>
 	<li><code>string</code><span>: New route with the extension  </span><code>.webp</code><span>.</span></li>
</ul>

<hr />

<h3><span>Example of use</span></h3>
<figure class="" aria-labelledby=" ">
<div class=""><span id=" " class=""><span>PHP</span></span> </div>
<div class="">
<div class=""></div>
</div>
<div class="">
<pre class="" tabindex="0"><code class=""><span class="">&lt;?php</span>

<span class="">require_once</span> <span class="">'ImageConverter.php'</span>;

<span class="">try</span> {
    <span class="">$converter</span> = <span class="">new</span> <span class="">ImageConverter</span>();
    <span class="">$converter</span>-&gt;<span class="">convertToWebP</span>();
} <span class="">catch</span> (<span class="">Exception</span> <span class="">$e</span>) {
    <span class="">echo</span> <span class="">"Error: "</span> . <span class="">$e</span>-&gt;<span class="">getMessage</span>();
}
</code></pre>
</div></figure>
<ol>
 	<li><span>Place the script in the directory where the images are.</span></li>
 	<li><span>Run the script from the command line:</span>
<figure class="" aria-labelledby=" ">
<div class=""><span id=":r3m:" class=""><span>bash</span></span> </div>
<div class="">
<div class=""></div>
</div>
<div class="">
<pre class="" tabindex="0"><code class="">php nombre_del_script.php
</code></pre>
</div></figure>
</li>
 	<li><span>The generated files  </span><code>.webp</code><span> will be saved in the same directory.</span></li>
</ol>

<hr />

<h3><span>Outgoing messages</span></h3>
<ul>
 	<li><strong><span>Success:</span></strong>
<figure class="" aria-labelledby=" ">
<div class=""><span id=":r3s:" class=""><span>text</span></span> </div>
<div class="">
<div class=""></div>
</div>
<div class="">
<pre class="" tabindex="0"><code class="">Imagen convertida con éxito: nombre_del_archivo.webp
</code></pre>
</div></figure>
</li>
 	<li><strong><span>Error loading image:</span></strong>
<figure class="" aria-labelledby=":r42:">
<div class=""><span id=" " class=""><span>text</span></span> </div>
<div class="">
<div class=""></div>
</div>
<div class="">
<pre class="" tabindex="0"><code class="">No se pudo cargar la imagen: nombre_del_archivo.jpg
</code></pre>
</div></figure>
</li>
 	<li><strong><span>Error converting image:</span></strong>
<figure class="" aria-labelledby=" ">
<div class=""><span id=":r48:" class=""><span>text</span></span> </div>
<div class="">
<div class=""></div>
</div>
<div class="">
<pre class="" tabindex="0"><code class="">Error al convertir la imagen: nombre_del_archivo.jpg
</code></pre>
</div></figure>
</li>
</ul>

<hr />

<h3><span>Important Notes</span></h3>
<ol>
 	<li><span>This script does not delete the original files ( </span><code>.jpg</code><span> or  </span><code>.jpeg</code><span>) after conversion.</span></li>
 	<li><span>If a file with the same name and extension  </span><code>.webp</code><span> already exists, it will be overwritten.</span></li>
 	<li><span>Make sure all images in the directory are valid and accessible to avoid errors.</span></li>
</ol>

<hr />

<h3><span>License</span></h3>
<span>This script is free to use and can be modified according to the developer's needs.</span>
