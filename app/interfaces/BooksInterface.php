<?php

namespace App\Interfaces;

interface BooksInterface
{
    public function index($request);
    public function show($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($request, $id);
    public function makeComparisons($request);
}
