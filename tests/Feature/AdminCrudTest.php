<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase;

    private function adminSession(): array
    {
        return ['admin_user_id' => 1, 'admin_name' => 'Administrator'];
    }

    public function test_article_crud_validates_and_uploads_image(): void
    {
        Storage::fake('public');

        $this->withSession($this->adminSession())->post('/admin/articles', [
            'title' => 'Koleksi Cartiera Terbaru',
            'content' => 'Konten artikel ini cukup panjang untuk melewati validasi minimum aplikasi.',
            'image' => UploadedFile::fake()->image('article.jpg'),
        ])->assertRedirect('/admin/articles');

        $article = Article::firstOrFail();
        Storage::disk('public')->assertExists($article->image);

        $this->withSession($this->adminSession())->put('/admin/articles/'.$article->id, [
            'title' => 'Koleksi Cartiera Diperbarui',
            'content' => 'Isi artikel diperbarui dan tetap memenuhi panjang validasi minimum.',
        ])->assertRedirect('/admin/articles');
        $this->assertDatabaseHas('articles', ['title' => 'Koleksi Cartiera Diperbarui']);

        $this->withSession($this->adminSession())->delete('/admin/articles/'.$article->id)
            ->assertRedirect();
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    public function test_all_required_content_types_can_be_created(): void
    {
        Storage::fake('public');

        $this->withSession($this->adminSession())->post('/admin/companies', [
            'name' => 'PT Cartiera Indonesia',
            'description' => 'Profil perusahaan Cartiera yang lengkap untuk kebutuhan pengujian aplikasi.',
            'address' => 'Gading Serpong, Tangerang',
        ])->assertRedirect('/admin/companies');

        $this->withSession($this->adminSession())->post('/admin/services', [
            'name' => 'Essential Polo',
            'description' => 'Produk polo berkualitas dengan bahan nyaman untuk kegiatan sehari-hari.',
            'image' => UploadedFile::fake()->image('polo.png'),
        ])->assertRedirect('/admin/services');

        $this->withSession($this->adminSession())->post('/admin/contacts', [
            'email' => 'hello@cartiera.id',
            'phone' => '0821 3060 9314',
            'address' => 'Gading Serpong, Tangerang',
        ])->assertRedirect('/admin/contacts');

        $this->assertSame(1, Company::count());
        $this->assertSame(1, Service::count());
        $this->assertSame(1, Contact::count());
    }

    public function test_report_download_returns_pdf(): void
    {
        Article::create(['title' => 'Artikel Report', 'content' => 'Isi artikel untuk laporan PDF Cartiera.', 'image' => null]);

        $this->withSession($this->adminSession())->get('/admin/reports/articles')
            ->assertOk()
            ->assertHeader('content-type', 'application/pdf');
    }
}
