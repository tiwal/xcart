<?php /* Smarty version 2.6.26, created on 2015-12-02 18:51:08
         compiled from main/order_status.tpl */ ?>
<?php if ($this->webmaster_mode) { ?><div id="common_files0main0order_status.tpl1" onmouseover="javascript: dmo(this, event);" class="section"><?php } ?><?php func_load_lang($this, "main/order_status.tpl","lbl_wrong_status,lbl_not_finished,lbl_queued,lbl_pre_authorized,lbl_processed,lbl_backordered,lbl_declined,lbl_failed,lbl_complete,lbl_not_finished,lbl_queued,lbl_pre_authorized,lbl_processed,lbl_declined,lbl_backordered,lbl_failed,lbl_complete"); ?><?php if ($this->_tpl_vars['extended'] == "" && $this->_tpl_vars['status'] == ""): ?>

<?php echo $this->_tpl_vars['lng']['lbl_wrong_status']; ?>


<?php elseif ($this->_tpl_vars['mode'] == 'select'): ?>

<select name="<?php echo $this->_tpl_vars['name']; ?>
" <?php echo $this->_tpl_vars['extra']; ?>
>
<?php if ($this->_tpl_vars['extended'] != ""): ?>
  <option value="">&nbsp;</option>
<?php endif; ?>
  <option value="I"<?php if ($this->_tpl_vars['status'] == 'I'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_not_finished']; ?>
</option>
  <option value="Q"<?php if ($this->_tpl_vars['status'] == 'Q'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_queued']; ?>
</option>
  <?php if ($this->_tpl_vars['status'] == 'A' || $this->_tpl_vars['display_preauth']): ?><option value="A"<?php if ($this->_tpl_vars['status'] == 'A'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_pre_authorized']; ?>
</option><?php endif; ?>
  <option value="P"<?php if ($this->_tpl_vars['status'] == 'P'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_processed']; ?>
</option>
  <option value="B"<?php if ($this->_tpl_vars['status'] == 'B'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_backordered']; ?>
</option>
  <option value="D"<?php if ($this->_tpl_vars['status'] == 'D'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_declined']; ?>
</option>
  <option value="F"<?php if ($this->_tpl_vars['status'] == 'F'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_failed']; ?>
</option>
  <option value="C"<?php if ($this->_tpl_vars['status'] == 'C'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_complete']; ?>
</option>
</select>

<?php elseif ($this->_tpl_vars['mode'] == 'static'): ?>

<?php if ($this->_tpl_vars['status'] == 'I'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_not_finished']; ?>


<?php elseif ($this->_tpl_vars['status'] == 'Q'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_queued']; ?>


<?php elseif ($this->_tpl_vars['status'] == 'A'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_pre_authorized']; ?>


<?php elseif ($this->_tpl_vars['status'] == 'P'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_processed']; ?>


<?php elseif ($this->_tpl_vars['status'] == 'D'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_declined']; ?>


<?php elseif ($this->_tpl_vars['status'] == 'B'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_backordered']; ?>


<?php elseif ($this->_tpl_vars['status'] == 'F'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_failed']; ?>


<?php elseif ($this->_tpl_vars['status'] == 'C'): ?>
<?php echo $this->_tpl_vars['lng']['lbl_complete']; ?>


<?php endif; ?>

<?php endif; ?><?php if ($this->webmaster_mode) { ?></div><?php } ?>