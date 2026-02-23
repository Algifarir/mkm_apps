<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
  public function run(): void
  {
    $menus = [
      // PRODUCTION
      [
        'title' => 'DigiMAMS',
        'url' => 'https://apps.ptmkm.co.id/DigiMAMS',
        'icon' => 'bi bi-gear',
        'category' => 'production',
        'keywords' => 'digimams production maintenance',
      ],
      [
        'title' => 'IWS Integration',
        'url' => 'https://apps.ptmkm.co.id/mkm_ckdMonitoring/public/',
        'icon' => 'bi bi-puzzle',
        'category' => 'production',
        'keywords' => 'iws integration ckd monitoring',
      ],
      [
        'title' => 'Dies Smart System',
        'url' => 'https://apps.ptmkm.co.id/mkm_strokeMonitoring/public/',
        'icon' => 'bi bi-cpu',
        'category' => 'production',
        'keywords' => 'dies smart system stroke monitoring',
      ],
      [
        'title' => 'Engine Test',
        'url' => 'http://172.17.210.224/iq-pro/login/login.php',
        'icon' => 'bi bi-activity',
        'category' => 'production',
        'keywords' => 'engine running test quality',
      ],
      [
        'title' => 'TM Assy Test',
        'url' => 'http://172.17.210.224/iq-pro/tm_login.php',
        'icon' => 'bi bi-sliders',
        'category' => 'production',
        'keywords' => 'tm assy test transmission',
      ],
      [
        'title' => 'Pallet Tracing',
        'url' => 'https://apps.ptmkm.co.id/mkm_palletTracing',
        'icon' => 'bi bi-box-seam',
        'category' => 'production',
        'keywords' => 'pallet tracing tracking logistics',
      ],
      [
        'title' => 'SL-Frame Check',
        'url' => 'https://apps.ptmkm.co.id/mkm_slframe',
        'icon' => 'bi bi-list-check',
        'category' => 'production',
        'keywords' => 'checksheet sl frame quality',
      ],
      [
        'title' => 'Traceability Engine',
        'url' => 'http://172.19.16.243:3000/login',
        'icon' => 'bi bi-gear-wide-connected',
        'category' => 'production',
        'keywords' => 'mkm traceability engine',
      ],
      [
        'title' => 'Operation Report',
        'url' => 'https://apps.ptmkm.co.id/mkm_operationreport/',
        'icon' => 'bi bi-bar-chart-line-fill',
        'category' => 'production',
        'keywords' => 'operation report production',
      ],

      // MANAGEMENT
      [
        'title' => 'Audit Portal',
        'url' => 'https://apps.ptmkm.co.id/mkm_auditportal',
        'icon' => 'bi bi-clipboard2-check',
        'category' => 'management',
        'keywords' => 'audit portal quality',
      ],
      [
        'title' => 'APAR Checksheet',
        'url' => 'https://apps.ptmkm.co.id/mkm_apar/public/',
        'icon' => 'bi bi-fire',
        'category' => 'management',
        'keywords' => 'apar checksheet fire safety',
      ],
      [
        'title' => 'Customer & Supplier',
        'url' => 'https://apps.ptmkm.co.id/mkm_suppliermst/public/',
        'icon' => 'bi bi-people',
        'category' => 'management',
        'keywords' => 'customer supplier management',
      ],
      [
        'title' => 'IT FAMS',
        'url' => 'https://apps.ptmkm.co.id/mkm_itfam/',
        'icon' => 'bi bi-pc-display-horizontal',
        'category' => 'management',
        'keywords' => 'it fams fixed asset management',
      ],
      [
        'title' => 'Asset Mgmt',
        'url' => 'https://apps.ptmkm.co.id/mkm_assetmanagement',
        'icon' => 'bi bi-archive',
        'category' => 'management',
        'keywords' => 'asset management inventory',
      ],

      // MONITORING
      [
        'title' => 'Energy Monitor',
        'url' => 'http://172.17.210.34/AnyGlass/MKM_SCADA/MKM_ENERGY/Main.gdfx',
        'icon' => 'bi bi-ev-station',
        'category' => 'monitoring',
        'keywords' => 'energy monitoring power consumption',
      ],
      [
        'title' => 'SCADA Engine',
        'url' => 'http://172.17.210.34/anyglass/MKM_SCADA/Main.gdfx',
        'icon' => 'bi bi-graph-up-arrow',
        'category' => 'monitoring',
        'keywords' => 'scada engine monitoring control',
      ],
      [
        'title' => 'SCADA Stamping',
        'url' => 'http://172.17.210.34/anyglass/MKM1_SCADA/Main%20V3.gdfx',
        'icon' => 'bi bi-display',
        'category' => 'monitoring',
        'keywords' => 'scada stamping press monitoring',
      ],
      [
        'title' => 'Solar Panel',
        'url' => 'https://server.growatt.com/login',
        'icon' => 'bi bi-sun',
        'category' => 'monitoring',
        'keywords' => 'solar panel renewable energy',
      ],

      // QUALITY
      [
        'title' => 'Quality Portal',
        'url' => 'https://portalapps.ptmkm.co.id/mkm_supplierquality/',
        'icon' => 'bi bi-shield-check',
        'category' => 'quality',
        'keywords' => 'quality portal supplier',
      ],
      [
        'title' => 'Nugget Test',
        'url' => 'https://apps.ptmkm.co.id/mkm_operationreport/',
        'icon' => 'bi bi-check2-square',
        'category' => 'quality',
        'keywords' => 'nugget test quality',
      ],

      // OTHER
      [
        'title' => 'IWS',
        'url' => 'https://task.mile.app/login',
        'icon' => 'bi bi-kanban',
        'category' => 'other',
        'keywords' => 'iws task work instruction',
      ],
      [
        'title' => 'E2E',
        'url' => 'https://e2e.ptmkm.co.id./login',
        'icon' => 'bi bi-link-45deg',
        'category' => 'other',
        'keywords' => 'e2e end to end integration',
      ],
      [
        'title' => 'MKM Workflow',
        'url' => 'https://365ptmkm.sharepoint.com/sites/MKMWorkFlow',
        'icon' => 'bi bi-diagram-3',
        'category' => 'other',
        'keywords' => 'mkm workflow sharepoint',
      ],
    ];

    foreach ($menus as $index => $menu) {
      Menu::create([
        'title' => $menu['title'],
        'slug' => Str::slug($menu['title']),
        'url' => $menu['url'],
        'icon' => $menu['icon'],
        'category' => $menu['category'],
        'keywords' => $menu['keywords'],
        'sort_order' => $index + 1,
        'is_active' => true,
      ]);
    }
  }
}
