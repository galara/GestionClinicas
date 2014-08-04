<?php

class RegionesTest extends WebTestCase
{
	public $fixtures=array(
		'regiones'=>'Regiones',
	);

	public function testShow()
	{
		$this->open('?r=regiones/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=regiones/create');
	}

	public function testUpdate()
	{
		$this->open('?r=regiones/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=regiones/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=regiones/index');
	}

	public function testAdmin()
	{
		$this->open('?r=regiones/admin');
	}
}
