<?php namespace App\Repositories;

use App\Models\RequiredDocument;

class RequiredDocumentRepository extends Repository
{
    public function all()
    {
        return RequiredDocument::all();
    }

    public function create(array $data)
    {

    }

    public function update(array $data, $id)
    {

    }

    public function delete($id)
    {

    }

    public function show($id)
    {

    }

    public function documentsOfArchive($archive)
    {
        return [
            'personal_documents'
        ];
    }

    
}
