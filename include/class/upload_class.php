<?php
/**
 ** if( $_FILES ){
 *   $upload = new Upload('./abc');
 *   if( $upload->do_upload('photo') ){
  *      // success
 *       var_dump( $upload->data() );
  *  }else{
  *      // failure
  *  }
*   }
 */
class Upload {

	public $max_size = 2097152;
	public $file_type = array('image/jpeg', 'image/png', 'image/gif');
	public $filename = '';
	public $save_upload_path = 'uploads';
	public $full_name = '';
	public $suffix = '';

	public function __construct($path='', $type=array(), $size=0, $name=''){
		if($path){
			$this->set_upload_path($path);
		}
		if($type){
			$this->set_file_type($type);
		}
		if($size){
			$this->set_max_size($size);
		}
		$this->set_filename($name);
	}

    /**
     * 限制文件大小最大值
     */
    public function set_max_size($n){
    	$this->max_size = $n > 0 ? (int)$n : 0;
    }

    /**
     * 限制文件类型
     */
    public function set_file_type($type){
    	if( !empty($type) ){
    		$this->file_type = $type;
    	}
    }

    /**
     * 设置文件名称
     */
    public function set_filename($name=''){
    	$this->filename = empty($name) ? date('YmdHis').mt_rand(1000,9999) : $name;
    }

    public function set_upload_path($path=''){
    	if( !empty($path) ){
    		$this->save_upload_path = $path;
    	}
    }

    public function data(){
    	return array(
    		'full_name' => $this->filename . '.' . $this->suffix,
    		'full_path' => $this->save_upload_path . '/' . $this->filename . '.' . $this->suffix
    		);
    }

    /**
     * 执行上传操作
     * @param $input_name
     */
    public function do_upload($input_name){
        // 上传过来的文件
    	$file = $_FILES[$input_name];

        // 文件大小 2MB
    	if( $file['size'] > $this->max_size ){
    		exit("<script type='text/javascript'>alert('你上传的文件大小超过{$this->max_size}字节')</script>");
    	}

        // 文件类型
    	if( !in_array($file['type'], $this->file_type) ){
    		exit("请上传". implode('、', $this->file_type) . "的文件");

    	}

        // 文件后缀
    	$this->suffix = pathinfo($file['name'], PATHINFO_EXTENSION);

        // 自动创建文件
    	if( !file_exists($this->save_upload_path) ){
    		mkdir($this->save_upload_path, 0777, true);
    	}

        // 保存文件
    	$result = move_uploaded_file($file['tmp_name'], "{$this->save_upload_path}/{$this->filename}.{$this->suffix}" );

    	if( $result ){
    		return true;
    	}else{
    		return false;
    	}
    }
  }
  ?>