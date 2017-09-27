<?php

use Illuminate\Database\Seeder;

class DirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*  App\Director::create([
            'name' => 'Martin Scorsese',
            'description' => 'Filmes sólidos, duros e que retratam a realidade'
            . ' deturpada. Scorcese tem muitos filmes que fizeram grande sucesso.'
        ]);
        App\Director::create([
            'name' => 'Christopher Nolan',
            'description' => 'Seus primeiros filmes (The Following e Amnésia) são'
            . ' inquietantes e totalmente curiosos. Deste então, Nolan ficou cada '
            . 'vez mais conhecido por suas histórias geniais, cheias de reviravoltas'
            . ' e detalhes que dão um nó no cérebro.'
        ]);
        App\Director::create([
            'name' => 'Joel e Ethan Coen',
            'description' => 'Thrillers, dramas e histórias policiais geniais'
            . ' são com esses dois irmãos mesmo. Seus filmes apresentam personagens'
            . ' fascinantes e um clima um tanto cômico e surreal – mas não tanto, eles'
            . ' apenas deturpam levemente a realidade em suas histórias cruéis.'
        ]);
        App\Director::create([
            'name' => 'Steven Speilberg',
            'description' => 'Conhecido por ter uma vasta lista de filmes excepcionais,'
            . ' Speilberg é um dos gigantes do cinema tanto em questão de efeitos especiais,'
            . ' quanto em roteiro, produção e direção.'
        ]);
         App\Director::create([
            'name' => 'Quentin Tarantino',
            'description' => 'Conhecido por inserir elementos de violência e aterrorizantes'
             . ' em seus filmes, com elementos de ação e muita loucura.'
        ]); */
          App\Director::create([
            'name' => 'Eric Kripke',
            'description' => 'CEric Kripke (Toledo, 24 de abril de 1974) é um roteirista,'
              . ' diretor e produtor de televisão americano, mais conhecido por ter criado'
              . ' a série de televisão Supernatural, da The CW.'
        ]);
            App\Director::create([
            'name' => 'Greg Berlanti',
            'description' => 'Greg Berlanti (Rye, 24 de maio de 1972) é um produtor'
                . ' de televisão e roteirista estadunidense.'
        ]);
        App\Director::create([
            'name' => 'Edward Kitsis',
            'description' => 'Edward Lawrence Kitsis (escrito também como Eddy Kitsis)'
            . ' é um escritor americano e produtor televisivo, que ficou famoso ao '
            . 'incorporar a equipe de escritores de Lost. Muitos dos episódios'
            . ' foram co-escritos com Adam Horowitz.'
        ]);  
         
          
        
        
        
        
    }
}
