<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devices = [
            [
                "id" => 1,
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2023-001",
                "serial_number" => "bPJ61083Gp",
                "brand" => "LG",
                "model" => "24MP400",
                "status" => "active"
            ],
            [
                "id" => 2,
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2023-002",
                "serial_number" => "ZuS81689dk",
                "brand" => "Epson",
                "model" => "EcoTank L3150",
                "status" => "in_repair"
            ],
            [
                "id" => 3,
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2023-003",
                "serial_number" => "Mwx82261XW",
                "brand" => "APC",
                "model" => "Smart-UPS 750",
                "status" => "active"
            ],
            [
                "id" => 4,
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-004",
                "serial_number" => "IGI29506vp",
                "brand" => "Lenovo",
                "model" => "ThinkCentre M720",
                "status" => "retired"
            ],
            [
                "id" => 5,
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2024-005",
                "serial_number" => "ViG47447Vp",
                "brand" => "Cisco",
                "model" => "Switch 2960",
                "status" => "in_repair"
            ],
            [
                "id" => 6,
                "device_type_id" => "Notebook",
                "device_type" => "Notebook",
                "asset_tag" => "NO-2024-006",
                "serial_number" => "jew99020zg",
                "brand" => "Acer",
                "model" => "Aspire 5",
                "status" => "in_repair"
            ],
            [
                "id" => 7,
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2023-007",
                "serial_number" => "wWA14893cy",
                "brand" => "HP",
                "model" => "EliteDesk 800",
                "status" => "in_repair"
            ],
            [
                "id" => 8,
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-008",
                "serial_number" => "ytr10992Oa",
                "brand" => "HP",
                "model" => "EliteDesk 800",
                "status" => "active"
            ],
            [
                "id" => 9,
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-009",
                "serial_number" => "SEP30028Kd",
                "brand" => "HP",
                "model" => "EliteDesk 800",
                "status" => "in_repair"
            ],
            [
                "id" => 10,
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-010",
                "serial_number" => "pco50632zN",
                "brand" => "Lenovo",
                "model" => "ThinkCentre M720",
                "status" => "retired"
            ],
            [
                "id" => 11,
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2023-011",
                "serial_number" => "XZf02678LS",
                "brand" => "Dell",
                "model" => "OptiPlex 7090",
                "status" => "retired"
            ],
            [
                "id" => 12,
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2024-012",
                "serial_number" => "aKM87451Cu",
                "brand" => "HP",
                "model" => "LaserJet Pro M404dn",
                "status" => "active"
            ],
            [
                "id" => 13,
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2024-013",
                "serial_number" => "AHd72728jq",
                "brand" => "Cisco",
                "model" => "Switch 2960",
                "status" => "retired"
            ],
            [
                "id" => 14,
                "device_type_id" => "Notebook",
                "device_type" => "Notebook",
                "asset_tag" => "NO-2023-014",
                "serial_number" => "RTA49658YC",
                "brand" => "Lenovo",
                "model" => "ThinkPad X1",
                "status" => "active"
            ],
            [
                "id" => 15,
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2024-015",
                "serial_number" => "ecJ24096zx",
                "brand" => "Cisco",
                "model" => "Switch 2960",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Notebook",
                "device_type" => "Notebook",
                "asset_tag" => "NO-2024-016",
                "serial_number" => "uLg76937Np",
                "brand" => "Acer",
                "model" => "Aspire 5",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2024-017",
                "serial_number" => "ass92020XQ",
                "brand" => "APC",
                "model" => "Smart-UPS 750",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2024-018",
                "serial_number" => "Eqe98831Pw",
                "brand" => "Canon",
                "model" => "i-SENSYS LBP6030",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2023-019",
                "serial_number" => "gjm40972QD",
                "brand" => "Dell",
                "model" => "P2419H",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2024-020",
                "serial_number" => "tgf60310XH",
                "brand" => "Cisco",
                "model" => "Switch 2960",
                "status" => "active"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2023-021",
                "serial_number" => "UeS97951Ap",
                "brand" => "Epson",
                "model" => "EcoTank L3150",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2024-022",
                "serial_number" => "UqC85818Bj",
                "brand" => "LG",
                "model" => "24MP400",
                "status" => "active"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2023-023",
                "serial_number" => "MRU67804gr",
                "brand" => "Samsung",
                "model" => "S24F350FHE",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-024",
                "serial_number" => "GXk44982dN",
                "brand" => "HP",
                "model" => "EliteDesk 800",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2023-025",
                "serial_number" => "Fci52904Jo",
                "brand" => "Dell",
                "model" => "OptiPlex 7090",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2024-026",
                "serial_number" => "AwG52215iX",
                "brand" => "Dell",
                "model" => "P2419H",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2024-027",
                "serial_number" => "YSx75571Gc",
                "brand" => "Samsung",
                "model" => "S24F350FHE",
                "status" => "active"
            ],
            [
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2024-028",
                "serial_number" => "PzJ45740Xh",
                "brand" => "Cisco",
                "model" => "Switch 2960",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2023-029",
                "serial_number" => "ZYJ93198MZ",
                "brand" => "HP",
                "model" => "EliteDesk 800",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2024-030",
                "serial_number" => "Jxz38950RZ",
                "brand" => "Epson",
                "model" => "EcoTank L3150",
                "status" => "active"
            ],
            [
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2024-031",
                "serial_number" => "eLp31991ss",
                "brand" => "APC",
                "model" => "Smart-UPS 750",
                "status" => "active"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2023-032",
                "serial_number" => "Efy19195kZ",
                "brand" => "Dell",
                "model" => "P2419H",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2024-033",
                "serial_number" => "Uan86895Oh",
                "brand" => "Dell",
                "model" => "P2419H",
                "status" => "retired"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-034",
                "serial_number" => "Cxr69525cG",
                "brand" => "Dell",
                "model" => "OptiPlex 7090",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2023-035",
                "serial_number" => "KwW78869DG",
                "brand" => "Dell",
                "model" => "P2419H",
                "status" => "active"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2023-036",
                "serial_number" => "XnX13969iU",
                "brand" => "Epson",
                "model" => "EcoTank L3150",
                "status" => "active"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2023-037",
                "serial_number" => "FJQ34940jo",
                "brand" => "Dell",
                "model" => "OptiPlex 7090",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2023-038",
                "serial_number" => "uxH86095Rl",
                "brand" => "APC",
                "model" => "Smart-UPS 750",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Notebook",
                "device_type" => "Notebook",
                "asset_tag" => "NO-2024-039",
                "serial_number" => "wRl39657LU",
                "brand" => "Lenovo",
                "model" => "ThinkPad X1",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2024-040",
                "serial_number" => "zIi27260lb",
                "brand" => "Epson",
                "model" => "EcoTank L3150",
                "status" => "active"
            ],
            [
                "device_type_id" => "Notebook",
                "device_type" => "Notebook",
                "asset_tag" => "NO-2024-041",
                "serial_number" => "vYS51727FK",
                "brand" => "Lenovo",
                "model" => "ThinkPad X1",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Monitor",
                "device_type" => "Monitor",
                "asset_tag" => "MO-2023-042",
                "serial_number" => "erd49289qM",
                "brand" => "LG",
                "model" => "24MP400",
                "status" => "active"
            ],
            [
                "device_type_id" => "Other",
                "device_type" => "Other",
                "asset_tag" => "OT-2023-043",
                "serial_number" => "TuB81853eA",
                "brand" => "APC",
                "model" => "Smart-UPS 750",
                "status" => "active"
            ],
            [
                "device_type_id" => "Notebook",
                "device_type" => "Notebook",
                "asset_tag" => "NO-2023-044",
                "serial_number" => "Bqr56646vG",
                "brand" => "HP",
                "model" => "Pavilion 15",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-045",
                "serial_number" => "ImA56598ep",
                "brand" => "HP",
                "model" => "EliteDesk 800",
                "status" => "retired"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2024-046",
                "serial_number" => "jDP06253je",
                "brand" => "Canon",
                "model" => "i-SENSYS LBP6030",
                "status" => "active"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2024-047",
                "serial_number" => "QWl12905cR",
                "brand" => "Epson",
                "model" => "EcoTank L3150",
                "status" => "retired"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2023-048",
                "serial_number" => "IyH23058ZO",
                "brand" => "Dell",
                "model" => "OptiPlex 7090",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "Printer",
                "device_type" => "Printer",
                "asset_tag" => "PR-2023-049",
                "serial_number" => "wEn65000hl",
                "brand" => "Canon",
                "model" => "i-SENSYS LBP6030",
                "status" => "in_repair"
            ],
            [
                "device_type_id" => "PC",
                "device_type" => "PC",
                "asset_tag" => "PC-2024-050",
                "serial_number" => "Xif16744Dj",
                "brand" => "Dell",
                "model" => "OptiPlex 7090",
                "status" => "active"
            ]
        ];

        foreach ($devices as $device) {
            $deviceType = \App\Models\DeviceType::where('name', $device['device_type_id'])->first();
            \App\Models\Device::updateOrcreate(
                ["serial_number" => $device['serial_number']],
                [
                    'device_type_id' => $deviceType->id,
                    'name' => $device['device_type'],
                    'asset_tag' => $device['asset_tag'],
                    'brand' => $device['brand'],
                    'model' => $device['model'],
                ]
            );
        }
    }
}
