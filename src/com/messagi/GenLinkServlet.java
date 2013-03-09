package com.messagi;

import java.io.IOException;
import javax.servlet.http.*;
import javax.servlet.*;

public class GenLinkServlet extends HttpServlet {
	public void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws IOException {
		resp.setContentType("text/plain");
		resp.getWriter().println("Hello, world");
	}

	public void doPost(HttpServletRequest req, HttpServletResponse resp)
			throws IOException {
		try{
			// RequestDispatcher rd = req.getRequestDispatcher("index.jsp?m=omg"); 
			  resp.sendRedirect(".?m=omg");

			// req.setAttribute("m","omg");
			// rd.forward(req, resp);
		}catch(Exception e){
			e.printStackTrace();
		}
	}
}