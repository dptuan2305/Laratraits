<?php
/**
 * Saves to Storage
 *
 * This trait allows an object to be saved to the application storage.
 *
 * ---
 * MIT License
 *
 * Copyright (c) Italo Israel Baeza Cabrera
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * Laravel is a Trademark of Taylor Otwell. Copyright © 2011-2020 Laravel LLC.
 *
 * @link https://github.com/DarkGhostHunter/Laratraits
 */

namespace DarkGhostHunter\Laratraits;

use LogicException;
use Illuminate\Support\Facades\Storage;

trait SavesToStorage
{
    /**
     * Persists the current object data to the storage.
     *
     * @param  string|null  $path
     */
    public function saveToStore(string $path = null)
    {
        $this->defaultStorage()->put($path ?? $this->defaultStoragePath(), $this->toStore());
    }

    /**
     * Returns the Storage disk to use to save this object.
     *
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected function defaultStorage()
    {
        return Storage::disk();
    }

    /**
     * The full storage path to save this object.
     *
     * @return string
     */
    protected function defaultStoragePath() : string
    {
        throw new LogicException('The class ' . static::class . ' has no default path to store.');
    }

    /**
     * Get the content that should be persisted into the storage.
     *
     * @return $this
     */
    protected function toStore()
    {
        return $this;
    }
}
