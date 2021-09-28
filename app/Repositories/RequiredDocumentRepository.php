<?php namespace App\Repositories;

use App\Models\Archive;
use App\Models\ArchiveRequiredDocument;
use App\Models\RequiredDocument;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RequiredDocumentRepository implements Repository
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

    public function withFilesFrom(Archive $archive): Builder
    {
        return RequiredDocument::addSelect([
            'location' => ArchiveRequiredDocument::select('location')
            ->whereColumn('required_document_id', 'required_documents.id')
            ->where('archive_id', $archive->id)
            ->limit(1)
        ]);
    }    

    /**
     * Obtiene un arreglo con los 4 tipos de documentos
     */
    public function allFrom(Archive $archive) : array
    {
        return [
            $this->withFilesFrom($archive)->type('personal')->get(),
            $this->withFilesFrom($archive)->type('academic-lic')->get(),
            $this->withFilesFrom($archive)->type('academic-mast')->get(),
            $this->withFilesFrom($archive)->type('language')->get(),
            $this->withFilesFrom($archive)->type('entrance')->appliantDocuments()->get(),
        ];
    } 
}
