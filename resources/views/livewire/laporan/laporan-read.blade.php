<div>
  <!-- Form Laporan -->
  <main class="container">
    <div class="report-card shadow-sm">
      <h3 class="mb-4 border-bottom pb-2">Laporan-Laporan</h3>
        <div class="mb-3 form-check">
          <input
            class="form-check-input"
            type="radio"
            name="laporan"
            id="jadwalProyek"
             wire:model="type"
            value="jadwal"
          />
          <label class="form-check-label" for="jadwalProyek">
            Laporan Jadwal Proyek
          </label>
        </div>
        <div class="mb-3 form-check">
          <input
            class="form-check-input"
            type="radio"
            name="laporan"
            id="aktivitasProyek"
             wire:model="type"
            value="aktivitas"
          />
          <label class="form-check-label" for="aktivitasProyek">
            Laporan Aktivitas Proyek
          </label>
        </div>
        <div class="mb-3 form-check">
          <input
            class="form-check-input"
            type="radio"
            name="laporan"
            id="proyekKegiatan"
             wire:model="type"
            value="proyek"
          />
          <label class="form-check-label" for="proyekKegiatan">
            Laporan Proyek dan Kegiatan
          </label>
        </div>
        <div class="mb-3 form-check">
          <input
            class="form-check-input"
            type="radio"
            name="laporan"
             wire:model="type"
            id="pemakaianBahan"
            value="pemakaian"
          />
          <label class="form-check-label" for="pemakaianBahan">
            Laporan Pemakaian Bahan
          </label>
        </div>
        <div class="mb-4 form-check">
          <input
            class="form-check-input"
            type="radio"
            name="laporan"
            wire:model="type"
            id="perhitunganProyek"
            value="cpm"
          />
          <label class="form-check-label" for="perhitunganProyek">
            Laporan Perhitungan Proyek (CPM)
          </label>
        </div>
        <button wire:click="print" class="btn btn-primary btn-cetak">
          <span class="material-icons align-middle me-1"></span> CETAK
        </button>
    </div>
  </main>
</div>