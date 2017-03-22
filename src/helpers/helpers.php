<?php
/*
 * This file is part of Amamarul Integer Hashids.
 *
 * (c) Maru Amallo <ama_marul@hotmail.com>
 * 
 */
if (! function_exists('encode')) {
     /**
      * Encode Id
      * @method encode
      * @param  [int] $id
      * @param  [string] $connection
      * @return [string] Hashid
      */
     function encode($id, $connection = null)
     {
          if ($connection === null) {
               return \Hashids::encode($id);
          }
         return \Hashids::connection($connection)->encode($id);
     }
}

if (! function_exists('decode')) {
     /**
      * Decode Hashid
      * @method decode
      * @param  [string] $hashid
      * @param  [string] $connection
      * @return [int] Id
      */
     function decode($hashid, $connection = null)
     {
          if ($connection === null) {
               return \Hashids::decode($hashid);
          }
         return \Hashids::connection($connection)->decode($hashid);
     }
}
