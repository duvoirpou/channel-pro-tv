<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueAtIdPostAndIdUtilistateurToCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropUnique('commentaires_id_post_unique');
            $table->dropUnique('commentaires_id_utilisateur_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->unique('id_post');
            $table->unique('id_utilisateur');
        });
    }
}
