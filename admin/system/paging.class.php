<?php 
class paging
{
	var $currentpage,$number_of_pages,$val,$total_records,$records,$offset,$limit,$total_records_get,$pageno,$filename;
	var $stylecss,$call;
	function execute_query_for_paging($query,$limit,$filename,$stylecss,$call)
	{
		$this->currentpage=$_REQUEST[currentpage];
		$this->number_of_pages=$_REQUEST[number_of_pages];
		$this->val=$_REQUEST[val];
		$this->filename=$filename;
		$this->stylecss=$stylecss;
		$this->call=$call;
		
		$records=$query;
		
		
		$total_records=mysql_query($records);
		if($this->currentpage=="")
		{
			$this->currentpage=1;
			$this->number_of_pages=5;	
			$this->val=1;
		}

		$this->limit=$limit;
		$this->totalpages=ceil(mysql_num_rows($total_records) / $this->limit);
		$offset=($this->limit*$this->currentpage) - $this->limit;
		$records_get=$records." Limit $offset,$this->limit";
		
		$total_records_get=mysql_query($records_get);
		
		return $total_records_get;
	}
	
	function showpagenumber()
	{
		$pages=$this->number_of_pages - 5;
		
		if($pages==$this->currentpage)
		{
			$this->val=$this->currentpage - 4;
			$this->number_of_pages=$pages;
		}
		if($this->currentpage > $this->number_of_pages)
		{
			$this->number_of_pages=$this->currentpage+4;
			$this->val=$this->currentpage;
			
		}

		if($this->currentpage > 1)
		{
		 	$pageno.= "<a href=\"$this->filename?currentpage=" . ($this->currentpage - 1) . "&number_of_pages=$this->number_of_pages&val=$this->val&$this->call\" class=\"$this->stylecss\">Previous</a>"."&nbsp;&nbsp;";
		} 
			
		for($x=$this->val;$x<=$this->totalpages;$x++)
		{
			if($x<=$this->number_of_pages)
			{
				$pageno.= "<span style='color:#890000;'><b>|</b></span>"."&nbsp;&nbsp;";
				if($x==$this->currentpage)
				{
					$pageno.= "Page $x"."&nbsp;&nbsp;";	
				}
				else	
				{
					$pageno.= "<a href='$this->filename?currentpage=$x&number_of_pages=$this->number_of_pages&val=$this->val&$this->call' class='$this->stylecss'>Page $x</a>"."&nbsp;&nbsp;";	
				}
			}	
		}
		if($this->currentpage < $this->totalpages)
		{
		 	$pageno.= "<span style='color:#890000;'><b>|</b></span>"."&nbsp;&nbsp;"."<a href=\"$this->filename?currentpage=" . ($this->currentpage + 1) . "&number_of_pages=$this->number_of_pages&val=$this->val&$this->call\"  class='$this->stylecss'>Next</a>";
		}
	
		return $pageno;
	}
}

?>