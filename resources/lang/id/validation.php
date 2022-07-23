<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Atribute :attribute harus diterima.',
    'accepted_if' => 'Atribute :attribute harus diterima bila :other berisi :value.',
    "active_url" => ":Attribute bukan URL yang valid.",
    "after" => ":Attribute harus berisi tanggal setelah :date.",
    "after_or_equal" => ":Attribute harus berisi tanggal setelah atau sama dengan :date.",
    "alpha" => ":Attribute hanya boleh berisi huruf.",
    "alpha_dash" => ":Attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.",
    "alpha_num" => ":Attribute hanya boleh berisi huruf dan angka.",
    "array" => ":Attribute harus berisi sebuah array.",
    "attached" => ":Attribute sudah dilampirkan.",
    "before" => ":Attribute harus berisi tanggal sebelum :date.",
    "before_or_equal" => ":Attribute harus berisi tanggal sebelum atau sama dengan :date.",
    'between' => [
        'numeric' => ':Attribute harus bernilai antara :min sampai :max.',
        'file' => ':Attribute harus berukuran antara :min sampai :max kilobita.',
        'string' => ':Attribute harus berisi antara :min sampai :max karakter.',
        'array' => ':Attribute harus memiliki :min sampai :max anggota.',
    ],
    "boolean" => ":Attribute harus bernilai true atau false",
    "confirmed" => "Konfirmasi :attribute tidak cocok.",
    "current_password" => "Kata sandi salah.",
    "date" => ":Attribute bukan tanggal yang valid.",
    "date_equals" => ":Attribute harus berisi tanggal yang sama dengan :date.",
    "date_format" => ":Attribute tidak cocok dengan format :format.",
    "declined" => ":Attribute ini harus ditolak.",
    "declined_if" => ":Attribute ini harus ditolak ketika :other bernilai :value.",
    "different" => ":Attribute dan :other harus berbeda.",
    "digits" => ":Attribute harus terdiri dari :digits angka.",
    "digits_between" => ":Attribute harus terdiri dari :min sampai :max angka.",
    "dimensions" => ":Attribute tidak memiliki dimensi gambar yang valid.",
    "distinct" => ":Attribute memiliki nilai yang duplikat.",
    "doesnt_start_with" => "The :attribute may not start with one of the following: :values.",
    "email" => ":Attribute harus berupa alamat surel yang valid.",
    "ends_with" => ":Attribute harus diakhiri salah satu dari berikut: :values",
    "enum" => ":Attribute yang dipilih tidak valid.",
    "exists" => ":Attribute yang dipilih tidak valid.",
    "failed" => "Identitas tersebut tidak cocok dengan data kami.",
    "file" => ":Attribute harus berupa sebuah berkas.",
    "filled" => ":Attribute harus memiliki nilai.",
    'gt' => [
        'numeric' => ':Attribute harus bernilai lebih besar dari :value.',
        'file' => ':Attribute harus berukuran lebih besar dari :value kilobita.',
        'string' => ':Attribute harus berisi lebih besar dari :value karakter.',
        'array' => ':Attribute harus memiliki lebih dari :value anggota.',
    ],
    'gte' => [
        'numeric' => ':Attribute harus bernilai lebih besar dari atau sama dengan :value.',
        'file' => ':Attribute harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'string' => ':Attribute harus berisi lebih besar dari atau sama dengan :value karakter.',
        'array' => ':Attribute harus terdiri dari :value anggota atau lebih.',
    ],
    "image" => ":Attribute harus berupa gambar.",
    "in" => ":Attribute yang dipilih tidak valid.",
    "in_array" => ":Attribute tidak ada di dalam :other.",
    "integer" => ":Attribute harus berupa bilangan bulat.",
    "ip" => ":Attribute harus berupa alamat IP yang valid.",
    "ipv4" => ":Attribute harus berupa alamat IPv4 yang valid.",
    "ipv6" => ":Attribute harus berupa alamat IPv6 yang valid.",
    "json" => ":Attribute harus berupa JSON string yang valid.",

    'lt' => [
        'numeric' => ':Attribute harus bernilai kurang dari :value.',
        'file' => ':Attribute harus berukuran kurang dari :value kilobita.',
        'string' => ':Attribute harus berisi kurang dari :value karakter.',
        'array' => ':Attribute harus memiliki kurang dari :value anggota.',
    ],
    'lte' => [
        'numeric' => ':Attribute harus bernilai kurang dari atau sama dengan :value.',
        'file' => ':Attribute harus berukuran kurang dari atau sama dengan :value kilobita.',
        'string' => ':Attribute harus berisi kurang dari atau sama dengan :value karakter.',
        'array' => ':Attribute harus tidak lebih dari :value anggota.',
    ],
    'mac_address' => ':Attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'numeric' => ':Attribute maksimal bernilai :max.',
        'file' => ':Attribute maksimal berukuran :max kilobita.',
        'string' => ':Attribute maksimal berisi :max karakter.',
        'array' => ':Attribute maksimal terdiri dari :max anggota.',
    ],
    "mimes" => ":Attribute harus berupa berkas berjenis: :values.",
    "mimetypes" => ":Attribute harus berupa berkas berjenis: :values.",
    'min' => [
        'numeric' => ':Attribute minimal bernilai :min.',
        'file' => ':Attribute minimal berukuran :min kilobita.',
        'string' => ':Attribute minimal berisi :min karakter.',
        'array' => ':Attribute minimal terdiri dari :min anggota.',
    ],
    "multiple_of" => ":Attribute harus merupakan kelipatan dari :value",
    "not_in" => ":Attribute yang dipilih tidak valid.",
    "not_regex" => "Format :attribute tidak valid.",
    "numeric" => ":Attribute harus berupa angka.",
    "password" => "Kata sandi salah.",
    "present" => ":Attribute wajib ada.",
    "prohibited" => ":Attribute tidak boleh ada.",
    "prohibited_if" => ":Attribute tidak boleh ada bila :other adalah :value.",
    "prohibited_unless" => ":Attribute tidak boleh ada kecuali :other memiliki nilai :values.",
    "prohibits" => ":Attribute melarang isian :other untuk ditampilkan.",
    "regex" => "Format :attribute tidak valid.",
    "required" => ":Attribute wajib diisi.",
    "required_array_keys" => ":Attribute wajib berisi entri untuk: :values.",
    "required_if" => ":Attribute wajib diisi bila :other adalah :value.",
    "required_unless" => ":Attribute wajib diisi kecuali :other memiliki nilai :values.",
    "required_with" => ":Attribute wajib diisi bila terdapat :values.",
    "required_with_all" => ":Attribute wajib diisi bila terdapat :values.",
    "required_without" => ":Attribute wajib diisi bila tidak terdapat :values.",
    "required_without_all" => ":Attribute wajib diisi bila sama sekali tidak terdapat :values.",
    "same" => ":Attribute dan :other harus sama.",
    'size' => [
        'numeric' => ':Attribute harus berukuran :size.',
        'file' => ':Attribute harus berukuran :size kilobyte.',
        'string' => ':Attribute harus berukuran :size karakter.',
        'array' => ':Attribute harus mengandung :size anggota.',
    ],
    "starts_with" => ":Attribute harus diawali salah satu dari berikut: :values",
    "string" => ":Attribute harus berupa string.",
    "timezone" => ":Attribute harus berisi zona waktu yang valid.",
    "unique" => ":Attribute sudah ada sebelumnya.",
    "uploaded" => ":Attribute gagal diunggah.",
    "url" => "Format :attribute tidak valid.",
    "uuid" => ":Attribute harus merupakan UUID yang valid.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
