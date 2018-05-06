<?php
/**
  * @var \App\View\AppView $this
  */
?>
<main>
	<div class="container">
		<div class="col-12">
			<div class="card" style="min-width: 30%;">
			    <div class="card-block">

			        <!--Header-->
			        <div class="form-header primary-color">
			            <h3><i class="fa fa-star"></i>  Rate the act</h3>
			        </div>

			        <!--Body-->

					    <?= $this->Form->create($vote) ?>
					    <fieldset>
					        <legend><?= __('Rate the Act') ?></legend>
					        <?php
						        $options = array(12 => 12, 11 => 11, 10 => 10, 9 => 9, 8 => 8, 7 => 7, 6 =>6, 5 => 5, 4 => 4, 3 => 3, 2 => 2, 1 => 1);
						        echo $this->Form->label('country_id', 'You\'re voting on the act from: ');
					            echo $this->Form->select('country_id', $countries, ['disabled' => true, 'val' => $id, 'label' => 'Country', 'class' => 'form-control']);
					            echo $this->Form->label('overall_score', 'Performance score (/12)');
					            echo $this->Form->select('overall_score', $options, ['class' => 'form-control', 'empty' => true]);
					            echo $this->Form->label('song_score', 'Song score (/12)');
					            echo $this->Form->select('song_score', $options, ['class' => 'form-control', 'empty' => true]);
					            echo $this->Form->label('singer_score', 'Singer score (/12)');
					            echo $this->Form->select('singer_score', $options, ['class' => 'form-control', 'empty' => true]);
					            echo $this->Form->label('staging_score', 'Staging score (/12)');
					            echo $this->Form->select('staging_score', $options, ['class' => 'form-control', 'empty' => true]);
					        ?>
											<div class="input textarea">
												<label for="comments">Comments</label>
												<textarea onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,50);" onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,50);" name="comments" id="comments" rows="5"></textarea>
												<br>
												<font size="1">(Maximum characters: 50)<br>You have <input readonly type="text" name="countdown" size="3" value="50"> characters left.</font>
											</div>
					    </fieldset>
					    <?= $this->Form->submit('Vote!', ['class' => 'btn btn-outline-primary waves-effect pull-right']) ?>
					    <?= $this->Form->end() ?>
			    </div>
			</div>
		</div>
	</div>
</main>
