<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class Books extends Controller
{
    public function index()
    {
        $model = new BookModel();
        $data['books'] = $model->findAll();
        return view('books/index', $data);
    }

    public function create()
    {
        return view('books/create');
    }

    public function store()
    {
        helper(['form', 'url']);
        $model = new BookModel();

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'image' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return view('books/create', ['validation' => $this->validator]);
        }

        $imageName = 'placeholder.png';
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        }

        $model->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
            'image' => $imageName
        ]);

        return redirect()->to('/books')->with('message', 'Book added successfully');
    }

    public function edit($id)
    {
        $model = new BookModel();
        $data['book'] = $model->find($id);
        return view('books/edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);
        $model = new BookModel();
        $book = $model->find($id);

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'image' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return view('books/edit', ['book' => $book, 'validation' => $this->validator]);
        }

        $file = $this->request->getFile('image');
        $imageName = $book['image'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($imageName && $imageName !== 'placeholder.png') {
                @unlink('uploads/' . $imageName);
            }
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        }

        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
            'image' => $imageName
        ]);

        return redirect()->to('/books')->with('message', 'Book updated successfully');
    }

    public function delete($id)
    {
        $model = new BookModel();
        $book = $model->find($id);

        if ($book && $book['image'] && $book['image'] !== 'placeholder.png') {
            @unlink('uploads/' . $book['image']);
        }

        $model->delete($id);
        return redirect()->to('/books')->with('message', 'Book deleted successfully');
    }
}
